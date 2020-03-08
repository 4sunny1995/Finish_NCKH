@extends('admin.master')
<br><br><br>
@section('content')
    <div class="container">
        <form action="/admin/topic/create" method="post">
            @csrf
            @include('layouts.message')
        <div class="row">
            <div class="col-md-4">
                <div class="col-md-10"><label>Tên đề tài</label></div>
                <div class="col-md-10"><input type="text" class="form-control" name="threadname" placeholder="Tên đề tài" ></div>
            </div>
            
            <div class="col-md-4">
                <div class="col-md-10"><label>Email</label></div>
                <div class="col-md-10"><input type="email" class="form-control" name="email" placeholder="email" ></div>
            </div>
            <div class="col-md-4">
                <div class="col-md-10"><label>Tình trạng</label></div>
                <div class="col-md-10">
                    <select name="status" id="status" class="form-control">
                        <option selected value="10" class="form-control" selected >Chưa nghiệm thu</option>
                        <option value="11"class="form-control">Đã nghiệm thu</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="col-md-10"><label>Loại</label></div>
                <div class="col-md-10">
                    <select type="text" class="form-control" name="species">
                        <option selected class="form-control" value="11">Tạp chí</option>
                        <option class="form-control" value="12">Bài báo</option>
                        <option class="form-control" value="13">Lý luận</option>
                        <option class="form-control" value="14">NCKH Sinh viên</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-10"><label>Định mức</label></div>
                <div class="col-md-10">
                    <select type="text" class="form-control" name="point">
                        <option selected class="form-control" value="11">0.125đ</option>
                        <option class="form-control" value="12">0.25đ</option>
                        <option class="form-control" value="13">0.5đ</option>
                        <option class="form-control" value="14">0.75đ</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4" style="display: none" id="result">
                <div class="col-md-10"><label for="">Ngày nghiệm thu</label></div>
                <div class="col-md-10"><input type="date" class="form-control" name="dateOfaccept"/></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="col-md-10"><label for="comment">Mô tả đề tài</label></div>
                <div class="col-md-10">
                    <textarea class="form-control" rows="5" id="comment" name="describe" placeholder="Mô tả"></textarea>
                </div>
            </div>
            
        </div>
        <br>
        <div class="row text-center">
            <div class="col-md-10"><button type="submit" class="btn btn-primary">Thêm đề tài</button></div>
        </div>
    </form>
    </div>
@endsection