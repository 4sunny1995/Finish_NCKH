@extends('admin.master')
<br><br><br>
@section('content')
    <div class="container">
    <form action="{{route('admin.user.create')}}" method="POST">
            @csrf
            @include('layouts.message');
            <div class="col-md-4">
                <div class="col-md-10">
                    <label for="">Họ và tên</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="name" placeholder="Nhập họ và tên...">
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-10">
                    <label for="">Email</label>
                </div>
                <div class="col-md-10">
                    <input type="email" placeholder="example@company.com" class="form-control" name="email">
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-10">
                    <label for="">Mật khẩu</label>
                </div>
                <div class="col-md-10">
                    <input type="text" placeholder="Nhập mật khẩu..." class="form-control" name="password">
                </div>
            </div>
            <br>
            <div class="col-md-4 text-center"><div class="col-md-10"><button type="submit" class="btn btn-primary">Thêm tài khoản</button></div></div>
        </form>
    </div>
@endsection