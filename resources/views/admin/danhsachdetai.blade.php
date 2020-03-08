@extends('admin.master')
@section('content')
<br>
<br>
<br>
<div class="container">
    @include('layouts.message')
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <div class="form-inline">
                
                <input class="form-control m-2" type="text" placeholder="Nhập từ để tìm kiếm..." id="adminsearchdetai">
                <a type="submit" class="btn btn-primary" href="/admin/topic"> <i class="fa fa-refresh"></i> Refresh</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1 border">ID</div>
        <div class="col-md-1 border">Tên đề tài</div>
        <div class="col-md-1 border">Người thực hiện</div>
        <div class="col-md-2 border">Email</div>
        <div class="col-md-1 border">Loại</div>
        <div class="col-md-1 border">Định mức</div>
        <div class="col-md-2 border">Mô tả</div>
        <div class="col-md-1 border">Trạng thái</div>
        <div class="col-md-1 border">Ngày nghiệm thu</div>
        <div class="col-md-1 border">
            #
        </div>
    </div>
    <div id="subdanhsach">
    @foreach ($topics as $item)
        
        
    
    <div class="row">
        <div class="col-md-1 border" style="overflow: hidden">{{$item->id}}</div>
        <div class="col-md-1 border" style="overflow: hidden">{{$item->threadname}}</div>
        <div class="col-md-1 border" style="overflow: hidden">
            @foreach ($users as $user)
            @if ($user->id==$item->userid)
                {{$user->name}}
            @endif
            @endforeach

        </div>
        <div class="col-md-2 border" style="overflow: hidden">
            @foreach ($users as $user)
            @if ($user->id==$item->userid)
                {{$user->email}}
            @endif
            @endforeach
        </div>
        <div class="col-md-1 border" style="overflow: hidden">
            @switch($item->topic)
                @case(11)
                    Bài báo
                    @break
                @case(12)
                    Tạp chí
                    @break
                @case(12)
                    Lý luận
                @break
                @default NCKH Sinh Viên
                    
            @endswitch
        </div>
        <div class="col-md-1 border" style="overflow: hidden">
            @switch($item->point)
                @case(11)
                    0.125
                    @break
                @case(12)
                    0.25
                    @break
                @case(12)
                    0.5
                    @break    
                @default 0.75
                    
            @endswitch
        </div>
        <div class="col-md-2 border" style="overflow: hidden">{{$item->describe}}</div>
        <div class="col-md-1 border" style="overflow: hidden">
            @if ($item->status==11)
                Đã nghiệm thu
            @else
                Chưa nghiệm thu
            @endif
        </div>
        <div class="col-md-1 border">{{$item->dateOfaccept}}</div>
        <div class="col-md-1 border">
            <a href="/admin/chitietdetai/{{$item->id}}" title="Xem chi tiết" class="btn btn-success m-1"><i class="fa fa-eye"></i></a>
            <br>
            <button type="button" data-id="{{$item->id}}" class="btn btn-danger m-1" title="Xóa đề tài" data-toggle="modal" data-target="#myModal{{+$item->id}}" style="margin:5px,padding:3px"><i class="fa fa-trash"></i></button>
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
                    <a href="/admin/topic/delete/{{+$item->id}}" class="btn btn-success btnXoa" data-id="{{$item->id}}">Có</a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Không</button>
                    </div>
              
                  </div>
                </div>
        </div>

        </div>
    </div>
    @endforeach
    {{ $topics->links()}}
</div>
</div>
@endsection