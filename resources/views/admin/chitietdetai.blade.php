@extends('admin.master')
@section('content')
    <br><br><br>
    <div class="container">
        <form action="/admin/topic/capnhat" method="post">
            @csrf
            @include('layouts.message')
            <div class="row">
                <div class="col-md-4">
                    <div class="col-md-10"><label for="">ID</label></div>
                    <div class="col-md-10"><input type="number" name="id" class="form-control" value="{{$detai->id}}" style="display:none"></div>
                    <div class="col-md-10"><input type="number" name="" disabled class="form-control" value="{{$detai->id}}"></div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-10"><label for="">Người thực hiện</label></div>
                <div class="col-md-10"><input type="text" name="name" class="form-control" value="{{$user->name}}"></div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-10"><label for="">Email</label></div>
                <div class="col-md-10"><input type="email" name="email" class="form-control" value="{{$user->email}}"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="col-md-10"><label for="">Tên đềi tài</label></div>
                <div class="col-md-10"><input type="text" name="threadname" class="form-control" value="{{$detai->threadname}}"></div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-10"><label for="">Loại</label></div>
                    <div class="col-md-10">
                        <select name="species" class="form-control" id="change">
                            <option {{($detai->topic==11)?'selected':''}} value="11" class="form-control">Bài báo</option>
                            <option {{($detai->topic==12)?'selected':''}} value="12" class="form-control">Tạp chí</option>
                            <option {{($detai->topic==13)?'selected':''}} value="13" class="form-control">Lý luận</option>
                            <option {{($detai->topic==14)?'selected':''}} value="14" class="form-control">NCKH Sinh viên</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-10"><label for="">Định mức</label></div>
                    <div class="col-md-10">
                        <select name="point" class="form-control" id="changed" style="display: none">
                            <option {{$detai->point==0.125?'selected':''}} value="11" class="form-control">0.125đ</option>
                            <option {{$detai->point==0.25?'selected':''}} value="12" class="form-control">0.25đ</option>
                            <option {{$detai->point==0.5?'selected':''}} value="13" class="form-control">0.5đ</option>
                            <option {{$detai->point==0.75?'selected':''}} value="14" class="form-control">0.75đ</option>
                        </select>
                    </div>
                    <div class="col-md-10">
                        <select name="" class="form-control" id="changed1" disabled>
                            <option {{$detai->point==0.125?'selected':''}} value="11" class="form-control">0.125đ</option>
                            <option {{$detai->point==0.25?'selected':''}} value="12" class="form-control">0.25đ</option>
                            <option {{$detai->point==0.5?'selected':''}} value="13" class="form-control">0.5đ</option>
                            <option {{$detai->point==0.75?'selected':''}} value="14" class="form-control">0.75đ</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="col-md-10"><label for="">Tình trạng</label></div>
                    <div class="col-md-10">
                        <select name="status" class="form-control" id="status1">
                            <option {{$detai->status==0?'selected':''}} value="11" class="form-control">Chưa nghiệm thu</option>
                            <option {{$detai->status==1?'selected':''}} value="12" class="form-control">Đã nghiệm thu</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-4" id="result1" style="display: none">
                    <div class="col-md-10"><label for="">Ngày nghiệm thu</label></div>
                <div class="col-md-10"><input type="date" name="dateOfaccept" class="form-control" value="{{$detai->dateOfaccept?$detai->dateOfaccept:date('d-m-y')}}"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="col-md-10"><label for="comment">Mô tả đề tài</label></div>
                    <div class="col-md-10">
                    <textarea class="form-control" rows="5" id="comment" name="describe" placeholder="Mô tả">{{$detai->describe}}</textarea>
                    </div>
                </div>
            </div>
            <br>
            <div class="row text-center">
                <div class="col-md-10"><button type="submit" class="btn btn-primary">Cập nhật</button></div>
            </div>
        </form>
    </div>
@endsection