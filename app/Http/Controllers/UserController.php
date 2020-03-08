<?php

namespace App\Http\Controllers;

// use Illuminate\Auth\Middleware\Authenticate;

use App\Customer;
use App\Topic;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Support\Facades\Auth as Authenticate;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user=Auth::user();
        $data=Topic::where('userid',$user->id)->get();
        $customer=Customer:: where('userid',$user->id)->first();
        return view('user.profile',compact('user','data','customer'));
    }
    public function checking(Request $request)
    {
        $credentials = $request ->only('email','password');
        if(Auth ::attempt($credentials))return redirect( route('user.profile'));
        else return back()->with('error','Sai thông tin đăng nhập');
    }
    public function logout(){
        session()->flush();
        Auth::logout();
        // dd(session());
        return redirect(route('user.login'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // $credentials=$request->only('password');
        $user=User::find($id);
        $user->password=Hash::make($request->password);
        $user->save();
        if($user->save())return redirect(route('user.profile'))->with('success','Cập nhật thành công');
        else return redirect(route('user.profile'))->with('error','Cập nhật thất bại');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
