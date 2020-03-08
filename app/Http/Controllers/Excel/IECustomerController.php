<?php

namespace App\Http\Controllers\Excel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class IECustomerController extends Controller
{
    public function importExportView()
    {
       return view('Excel.ImportCustomer');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new UsersExport, 'customers.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        $check=Excel::import(new UsersImport,request()->file('file'));
        if($check)return back()->with('success','Import thành công'); 
        else return back()->with('error','Có lỗi xảy ra');
    }
}
