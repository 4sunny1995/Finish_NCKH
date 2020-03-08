@extends('admin.master')
<br><br><br><br>
@section('content')
<form action="/admin/user/capnhat" method="POST">
    @csrf
    @include('layouts.message')    
        @if ($data)
        <div class="container">
            <div class="row">
                <div class="col-md-4" style="display:none">
                    <div class="col-md-10"><label for="">ID tài khoản</label></div>
                    <div class="col-md-10">
                    <input class="form-control" type="number" name="userid" value="{{$data->userid}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-10"><label for="">ID tài khoản</label></div>
                    <div class="col-md-10">
                    <input class="form-control" type="number" value="{{$data->userid}}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-10"><label for="">Email</label></div>
                    <div class="col-md-10">
                    <input class="form-control" type="email" name="email" value="{{$temp->email}}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-10"><label for="">Mật khẩu</label></div>
                    <div class="col-md-10">
                    <input class="form-control" type="text" name="password" value="{{$temp->password}}" disabled >
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="col-md-10"><label for="">Họ và tên</label></div>
                    <div class="col-md-10">
                    <input class="form-control" type="text" name="name" value="{{$temp->name}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-10"><label for="">Địa chỉ</label></div>
                    <div class="col-md-10">
                    <input class="form-control" type="text" name="address" value="{{$data->address}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-10"><label for="">Số điện thoại</label></div>
                    <div class="col-md-10">
                    <input class="form-control" type="tel" name="phone" value="{{$data->phone}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="col-md-10"><label for="">Ngày tạo</label></div>
                    <div class="col-md-10">
                    <input class="form-control" type="datetime" name="created_at" value="{{$data->created_at}}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-10"><label for="">Ngày cập nhật</label></div>
                    <div class="col-md-10">
                    <input class="form-control" type="datetime" name="updated_at" value="{{$data->updated_at}}" disabled>
                    </div>
                </div>
                
            </div>
            <br>
            <div class="col-md-12 text-center"><button type="submit" class="btn btn-primary">Cập nhật</button></div>
        </div>

        @else
        <div class="container">
            <div class="row">
                <div class="col-md-4" style="display:none">
                    <div class="col-md-10"><label for="">ID tài khoản</label></div>
                    <div class="col-md-10">
                    <input class="form-control" type="number" name="userid" value="{{$temp->id}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-10"><label for="">ID tài khoản</label></div>
                    <div class="col-md-10">
                    <input class="form-control" type="number" value="{{$temp->id}}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-10"><label for="">Email</label></div>
                    <div class="col-md-10">
                    <input class="form-control" type="email" name="email" value="{{$temp->email}}" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-10"><label for="">Mật khẩu</label></div>
                    <div class="col-md-10">
                    <input class="form-control" type="text" name="password" value="{{$temp->password}}" >
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="col-md-10"><label for="">Họ và tên</label></div>
                    <div class="col-md-10">
                    <input class="form-control" type="text" name="name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-10"><label for="">Địa chỉ</label></div>
                    <div class="col-md-10">
                    <input class="form-control" type="text" name="address" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-10"><label for="">Số điện thoại</label></div>
                    <div class="col-md-10">
                    <input class="form-control" type="tel" name="phone" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="col-md-10"><label for="">Ngày tạo</label></div>
                    <div class="col-md-10">
                        
                    <input class="form-control" type="date" name="create_at" value="<?php echo date('Y-m-d'); ?>" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-10"><label for="">Ngày cập nhật</label></div>
                    <div class="col-md-10">
                    <input class="form-control" type="date" name="update_at" value="<?php echo date('Y-m-d'); ?>" >
                    </div>
                </div>
                
            </div>
            <br>
            <div class="col-md-12 text-center"><button type="submit" class="btn btn-primary">Cập nhật</button></div>
        </div>

        @endif
    </form>
@endsection