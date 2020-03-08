<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model_has_Role;
use App\Role;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
        if(Auth::check()) return redirect(route('admin.dashboard'));
        else return redirect(route('admin.login'));
    }
    public function loginForm()
    {
        return view('admin.login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('admin.login'));
    }
    public function checking(Request $request)
    {
        $data=$request->except('_token');
        // dd($data);
        $user=User::where('email',$request->email)->first();
        // $user->password=Hash::make($data['password']);
        // $user->save();
        // dd($user);
        if($user)
            if(Hash::check($data['password'],$user->password)){
                $roles=Model_has_Role::where('userid',$user->id)->first();
                    if($roles) {
                        Auth::attempt(['email' => $request->email, 'password' => $request->password]);
                        return redirect(route('admin.dashboard'));
                    }
                    else return back()->with('error','Tài khoản không đủ quyền hạn truy cập');
            }
            else return back()->with('error','Sai thông tin tài khoản');
        else return back()->with('error','Sai thông tin tài khoản');
    }
    public function index()
    {
        return view('admin.index');
    }
}
