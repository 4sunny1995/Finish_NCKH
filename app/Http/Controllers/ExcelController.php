<?php

namespace App\Http\Controllers;

use App\Exports\CustomersExport;
use App\Exports\TopicsExport;
use App\Exports\UsersExport;
use App\Imports\TopicsImport;
use App\Imports\UsersImport;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Maatwebsite\Excel\Concerns\ToArray;
// use Illuminate\Validation\Validator;
use Validator;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\VarDumper\Cloner\Data;

class ExcelController extends Controller
{
    //
    public function importExportView()
    {
       return view('import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportUser() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    public  function exportCustomer(){
        return Excel::download(new CustomersExport,'customer.xlsx');
    }
    public function exportTopic() 
    {
        return Excel::download(new TopicsExport, 'topics.xlsx');
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importUser(Request $request) 
    {
        $validator=$request->validate([
            'file'=>'required|max:5000|mimes:xlsx,xls,csv'
        ]);
        // dd($validator);
        if($validator){
            $time=date('Ymd_His');
            $file=$request->file('file');
            $fileName=$time.'-'.$file->getClientOriginalName();
            $savePath=public_path('/uploads/User/');
            $file->move($savePath,$fileName); 
            $data = Excel::import(new UsersImport,$savePath.$fileName);
            // dd($data);
            return redirect('/admin/danhsachUser')->with('success','Import thành công');
        }
        else return redirect('/admin/import/User')->with('error','Có lỗi xảy ra.');
    }
    public function importTopic(Request $request){
        $validator=$request->validate([
            'file'=>'required|max:5000|mimes:xlsx,xls,csv'
        ]);
        // dd($validator);
        if($validator){
            $time=date('Ymd_His');
            $file=$request->file('file');
            $fileName=$time.'-'.$file->getClientOriginalName();
            $savePath=public_path('/uploads/Topic/');
            $file->move($savePath,$fileName); 
            $data = Excel::import(new TopicsImport,$savePath.$fileName);
            // dd($data);
            return redirect('/admin/danhsachdetai')->with('success','Import thành công');
        }
        else return redirect('/admin/import/Topic')->with('error','Có lỗi xảy ra.');
    }
}
