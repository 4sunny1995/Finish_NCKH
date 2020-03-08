<?php

namespace App\Http\Controllers\Excel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\UsersExport;
use App\Imports\TopicsImport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;


class IETopicController extends Controller
{
    public function importExportView()
    {
       return view('Excel.ImportTopic');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new UsersExport, 'topics.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        $check=Excel::import(new TopicsImport,request()->file('file'));
        if($check)return back()->with('success','Import thành công'); 
        else return back()->with('error','Có lỗi xảy ra');
    }
}
