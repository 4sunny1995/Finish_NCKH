<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model_has_role;

class PermissionManagementController extends Controller
{
    public function up($id)
    {
        $temp=model_has_role::where('userid',$id)->first();
        if($temp){
            return back()->with('error','Tài khoản đã là Administrator');
        }
        else {
            $temp=new model_has_role();
            $temp->userid=$id;
            $temp->roleid=1;
            $temp->save();
            return back()->with('success','Tài khoản đã được thăng cấp thành công');
        }
    }
    public function down($id)
    {
        $temp=model_has_role::where('userid',$id)->first();
        if($temp){
            $temp->delete();
            $temp->save();
            if($temp->delete())return back()->with('success','Đã xóa quyền của tài khoản');
            else return back()->with('error','Có lỗi xảy ra');
        }
        else return back()->with('error','Tài khoản này không có quyền hạn gì');
    }
}
