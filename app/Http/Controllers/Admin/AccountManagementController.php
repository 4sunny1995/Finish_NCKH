<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model_has_role;
use App\User;

class AccountManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userList=User::paginate(20);
        $roles=model_has_role::all();
        return view('admin.danhsachUser',compact('userList','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials=$request->except('_token');
        $temp=User::where('email',$credentials['email'])->first();
        if($temp)return back()->with('error','Email đã có người sử dụng.');
        else {
            $user=User::insert($credentials);
            if($user)return back()->with('success','Thêm thành công');
            else return back()->with('error','Có lỗi xảy ra');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $temp=User::find($id);
        $data=Customer::where('userid',$id)->first();

        return view('admin.profile',compact('data','temp'));
        // if($user)return redirect(route('admin.user.edit'));
        // else return back()->with('error','Không tìm thấy đối tượng');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($id);
        $credentials=$request->except('_token');
        // dd($credentials);
        $customer=Customer::where('userid',$request->userid)->first();
        $user=User::find($request->userid);
        $user->name=$request->name;
        $user->save();
        // dd($user);
        // $customer->name=$request->name;
        $customer->address=$request->address;
        $customer->phone=$request->phone;
        $customer->save();
        // dd($user);
        if($user)
        return redirect('/admin/chitiet/'.$user->id)->with('success','Cập nhật thành công');
        else return redirect('/admin/chitiet/'.$id)->with('error','Có lỗi xảy ra');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id)->delete();
        // $user->destroy();
        if($user)return back()->with('success','Xóa thành công');
        else return back()->with('error','Có lỗi xảy ra');
    }
}
