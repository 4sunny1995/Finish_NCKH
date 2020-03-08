<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Topic;
use App\User;

class TopicManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics=Topic::paginate(20);
        $users=User::all();
        return view('admin.danhsachdetai',compact('topics','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createDetai');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $cretinal=$request->except('_token','email');
        $id=User::where('email',$request->email)->first();
        // dd($id);
        $cretinal['userid']=$id->id;
        // dd($cretinal);
        // $inf=$cretinal->except('email');
        $topic=Topic::insert($cretinal);
        if($topic)return back()->with('success','Thêm thành công');
        else return back()->with('error','Có lỗi xảy ra');
        // dd($cretinal);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detai=Topic::find($id);
        $user=User::where('id',$detai->userid)->first();
        return view('admin.chitietdetai',compact('detai','user'));
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
    public function update(Request $request)
    {
        $credential=$request->except('_token','email');
        // dd($credential);
        $user=User::where('email',$request->email)->first();
        $user->name=$request->name;
        $credential['userid']=$user->id;
        $topic=Topic::find($credential['id'])->update($credential);
        // $topic=Topic::where();
        if($topic)return back()->with('success','Cập nhật thành công');
        else return back()->with('error','Có lỗi xảy ra');
        // dd($credential);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topic=Topic::find($id)->delete();
        if($topic)return back()->with('success','Xóa thành công');
        else return back()->with('error','Có lỗi xảy ra');
    }
}
