@extends('admin.master')
<br>
<br>
<br>
@section('content')
    @include('layouts.message')
    <div class="container" style="background-color: white">
      <div class="row">  
      <div class="col-md-6"></div>
      
      <div class="col-md-6">
            <div class="form-inline">
                <input class="form-control m-2" type="text"placeholder="Nhập từ để tìm kiếm..." id="adminsearchuser">
                <a type="submit" class="btn btn-primary" href="/admin/danhsachUser"> <i class="fa fa-refresh"></i> Refresh</a>
            </div>
        </div>
      </div>
        <div class="row">
            <div class="col-md-1 border">ID</div>
            <div class="col-md-2 border">Họ và tên</div>
            <div class="col-md-2 border">Email</div>
            <div class="col-md-2 border">Mật khẩu</div>
            <div class="col-md-1 border">Ngày tạo</div>
            <div class="col-md-1 border">Ngày cập nhật</div>
            <div class="col-md-3 border"># </div>
        </div>
        <div id="subdanhsachuser">
        @foreach ($userList as $item)
        <div class="row">
            <div class="col-md-1 border">{{$item->id}}</div>
            <div class="col-md-2 border">{{$item->name}}</div>
            <div class="col-md-2 border" style="overflow: hidden">{{$item->email}}</div>
            <div class="col-md-2 border" style="overflow: hidden">{{$item->password}}</div>
            <div class="col-md-1 border">{{$item->created_at}}</div>
            <div class="col-md-1 border">{{$item->update_at}}</div>
            <div class="col-md-3 border">
                <button  class="btn btn-success btnXem" title="Chi tiết" data-id="{{$item->id}}" ><i class="fa fa-eye"></i></button>
                <button type="button" data-id="{{$item->id}}" class="btn btn-primary btnCapquyen" title="Thăng Cấp"><i class="fa fa-key"></i></button> 

               
                <button type="button" data-id="{{$item->id}}" class="btn btn-danger" title="Xóa" data-toggle="modal" data-target="#myModal{{+$item->id}}"><i class="fa fa-trash"></i></button>
                <div class="modal" id="myModal{{+$item->id}}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                  
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h5 class="modal-title">Thông báo</h5>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                  
                        <!-- Modal body -->
                        <div class="modal-body">
                          Bạn có chắc là muốn xóa đề tài này không?
                        </div>
                  
                        <!-- Modal footer -->
                        <div class="modal-footer">
                        <button type="button" class="btn btn-success btnXoa" data-id="{{$item->id}}">Có</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Không</button>
                        </div>
                  
                      </div>
                    </div>
            </div>
            @foreach ($roles as $role)
            @if ($item->id==$role->userid)
              <button type="button" data-id="{{$item->id}}" class="btn btn-danger btnXoaquyen" title="Giảm Cấp"><i class="fa fa-key"></i></button> 
              @break
            @endif
        @endforeach

            </div>
        </div>
        @endforeach
        {{ $userList->links()}}
      </div>
    </div>
@endsection