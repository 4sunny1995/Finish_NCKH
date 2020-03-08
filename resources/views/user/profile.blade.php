@extends('layouts.master')

@section('content')
<br>
<div class="row">
    <div class="col-md-4" style="height: auto;">
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action active" id="menu1">Danh sách đề tài</a>
          <a href="#" class="list-group-item list-group-item-action" id="menu2">Kê khai</a>
          <a href="#" class="list-group-item list-group-item-action" id="menu3">Thông tin cá nhân</a>
          <a href="#" class="list-group-item list-group-item-action" id="menu4">Thay đổi mật khẩu</a>
          <a href="#" class="list-group-item list-group-item-action" id="menu5">Thay đổi thông tin cá nhân</a>
        </div>
    </div>
    <div class="col-md-8">
        @include('layouts.message')
        <div class="container" id="danhsach">
            <div class="row">
                <div class="col-md-5">
                </div>
                <div class="col-md-7">
                    <div class="form-inline">
                        <button disabled="disabled" class="btn btn-light"><i class="fa fa-search"></i>Find</button>
                        <input class="form-control m-2" type="text" placeholder="Nhập từ để tìm kiếm..." name="btnSearch">
                        {{-- <a type="submit" class="btn btn-primary" href="/danhsachdetai"> <i class="fa fa-refresh"></i> Refresh</a> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 border" style="overflow: hidden">Tên đề tài</div>
                <div class="col-md-1 border" style="overflow: hidden">Người thực hiện</div>
                <div class="col-md-2 border" style="overflow: hidden">Email</div>
                <div class="col-md-1 border">Loại</div>
                <div class="col-md-1 border">Định mức</div>
                <div class="col-md-2 border" style="overflow: hidden">Mô tả</div>
                <div class="col-md-1 border">Trạng thái</div>
                <div class="col-md-1 border">Ngày nghiệm thu</div>
                <div class="col-md-1 border">
                    #
                </div>
            </div>
            <div id="subdanhsach">
            @foreach ($data as $item)
            <div class="row">
            <div class="col-md-2 border" style="overflow: hidden">{{$item->threadname}}</div>
            <div class="col-md-1 border" style="overflow: hidden" >{{$user->name}}</div>
                <div class="col-md-2 border" style="overflow: hidden">{{$user->email}}</div>
                <div class="col-md-1 border">
                    @switch($item->species)
                        @case(11)
                            Tạp chí
                            @break
                        @case(12)
                            Bài báo
                            @break
                        @case(13)
                            Lý luận
                            @break   
                        @default
                            NCKH Sinh viên
                    @endswitch
                </div>
            <div class="col-md-1 border">
                @switch($item->point)
                    @case(11)
                        0.125
                        @break
                    @case(12)
                        0.25
                        @break
                    @case(13)
                        0.5
                        @break
                    @default
                        0.75
                @endswitch
            </div>
                <div class="col-md-2 border" style="overflow: hidden">{{$item->describe}}</div>
                <div class="col-md-1 border">
                    @if ($item->status==1)
                        Đã nghiệm thu
                    @else
                        Chưa nghiệm thu
                    @endif
                </div>
            <div class="col-md-1 border">{{$item->dateOfAccept}}</div>
                <div class="col-md-1 border">
                    <button class="btn btn-success m-1 btnEdit" title="Sửa" data-id=""><span class="fa fa-edit"></span></button>
                    <button class="btn btn-danger m-1 btnDelete" title="Xóa" data-toggle="modal" data-target="#myModal" data-id=""><span class="fa fa-trash"></span></button>
                    <div class="modal" id="myModal">
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
                                <button type="button" class="btn btn-success">Có</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Không</button>
                            </div>
                      
                          </div>
                        </div>
                </div>
            </div>
        </div>

            @endforeach
        </div>
        </div>
        <div class="container" id="form" style="display: none;">
            <div class="text-center">
                <h4>Thông tin đề tài</h4>
            </div>
            <div>
            <form action="{{route('topic.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-10"><label>Tên đề tài</label></div>
                        <div class="col-md-10"><input class="form-control" type="text" name="threadname" placeholder="Tên đề tài"></div>
                        <div class="col-md-10"><label>Người thực hiện</label></div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="" value="{{Auth::user()->name}}" placeholder="Tên người thực hiện" disabled>
                        {{-- <input class="form-control" value="{{Auth::user()->name}}" type="text" name="name" placeholder="Tên người thực hiện" style="display:none"> --}}
                    </div>
                        <div class="col-md-10"><label>Mô tả</label></div>
                        <div class="col-md-10"><textarea name="describe" cols="40" rows="5" placeholder="Mô tả đề tài" class="form-control"></textarea></div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-10"><label>Loại</label></div>
                        <div class="col-md-10">
                            <select class="form-control" name="species" id="change">
                                <option class="form-control" value="11">Tạp chí</option>
                                <option class="form-control" value="12">Bài báo</option>
                                <option class="form-control" value="13">Lý luận</option>
                                <option class="form-control" value="14">NCKH Sinh viên</option>
                            </select>
                        </div>
                        <div class="col-md-10"><label>Định mức</label></div>
                        <div class="col-md-10">
                            <select class="form-control" disabled id="changed">
                                <option class="form-control" value="11">0.125đ</option>
                                <option class="form-control" value="12">0.25đ</option>
                                <option class="form-control" value="13">0.5đ</option>
                                <option class="form-control" value="14">0.75đ</option>

                            </select>
                            <select class="form-control" name="point" style="display:none" id="changed1">
                                <option class="form-control" value="11">0.125đ</option>
                                <option class="form-control" value="12">0.25đ</option>
                                <option class="form-control" value="13">0.5đ</option>
                                <option class="form-control" value="14">0.75đ</option>

                            </select>
                            <div style="display:none"><input type="number" name="userid" value="{{Auth::user()->id}}"></div>
                        </div>
                        <div class="col-md-10"><label>Tình trạng</label></div>
                        <div class="col-md-10">
                            <select class="form-control" id="status" name="status">
                                <option class="form-control" value="10">Chưa nghiệm thu</option>
                                <option class="form-control" value="11">Đã nghiệm thu</option>
                            </select>
                        </div>
                        <div id="result" style="display:none">
                            <div class="col-md-10"><label>Ngày nghiệm thu</label></div>
                            <div class="col-md-10"><input type="date" name="dateOfAccept" class="form-control" value="dd/mm/yyyy"></div>
                        </div>
                    </div>
            </div>
            <br>
            <div class="col-md-10 text-center">
                <button type="submit" class="btn btn-primary">Thêm đề tài</button>
            </div>
                </form>
            </div>
        </div>
        <div class="container" id="profile" style="display: none;">
            <div class="row">
                <div class="col-md-4">
                    <label for="">ID</label>
                    <div>
                    <input type="text" placeholder="" class="form-control" value="{{Auth::user()->id}}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="">Họ và tên</label>
                    <div>
                    <input type="text" placeholder="" class="form-control" value="{{Auth::user()->name}}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="">Email</label>
                    <div>
                    <input type="text" placeholder="" class="form-control" value="{{Auth::user()->email}}" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="">Mật khẩu</label>
                    <div>
                    <input type="text" placeholder="" class="form-control" value="{{Auth::user()->password}}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="">Ngày tạo</label>
                    <div>
                    <input type="text" placeholder="" class="form-control" value="{{$user->created_at}}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="">Ngày cập nhật</label>
                    <div>
                    <input type="text" placeholder="" class="form-control" value="{{$user->updated_at}}" disabled>
                    </div>
                </div>
            </div>
            <br>
            <div class="text-center">
                <button type="button" class="btn btn-primary">Thay đổi</button> 
            </div>
        </div>
        <div class="container" id="changepassword" style="display: none">
            <div class="col-md-10"><h5>Thay đổi mật khẩu</h5></div>
            <form action="/user/changePassword/{{Auth::user()->id}}" method="POST">
                @csrf
                <div class="col-md-10"><div class="col-md-6">Mật khẩu cũ</div></div>
                <div class="col-md-10"><div class="col-md-6"><input type="password" name="password" class="form-control"></div></div>
                <br>
                <div class="col-md-10"><div class="col-md-6">Mật khẩu mới</div></div>
                <div class="col-md-10"><div class="col-md-6"><input type="password" name="newpassword" class="form-control"></div></div>
                <br>
                <div class="col-md-10"><div class="col-md-6">Nhập lại mật khẩu mới</div></div>
                <div class="col-md-10"><div class="col-md-6"><input type="password" name="confirmpassword" class="form-control"></div></div>
                <br>
                <div class="col-md-10"><div class="col-md-6"><input type="submit" name="password" class="btn btn-primary"></div></div>
            </form>
        </div>
        <div class="container" style="display:none" id="changeProfile">
            <div class="col-md-10"><h5>Thay đổi thông tin cá nhân</h5></div>
                <form action="{{route('customer.update')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-10">ID</div>
                        <div class="col-md-10"><input type="number" name="" class="form-control" disabled value="{{Auth::user()->id}}"></div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10">Email</div>
                            <div class="col-md-10"><input type="text" name="email" class="form-control" disabled value="{{Auth::user()->email}}"></div>
                        </div><div class="col-md-4">
                            <div class="col-md-10">Mật khẩu</div>
                            <div class="col-md-10"><input type="text" name="password" class="form-control" disabled value="{{Auth::user()->password}}"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-10">Tên khách hàng</div>
                            <div class="col-md-10"><input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" disabled></div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10">Địa chỉ</div>
                            <div class="col-md-10"><input type="text" name="address" class="form-control" value="{{$customer?$customer->address:''}}"></div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10">Số điện thoại</div>
                            <div class="col-md-10"><input type="tel" name="phone" class="form-control" value="{{$customer?$customer->phone:''}}"></div>
                        </div>
                    <div style="display:none"><input type="text" name="userid" value="{{Auth::user()->id}}"></div>
                    </div>
                    <br>
                    <div class="col-md-12 text-center"><div class="col-md-12"><button type="submit" class="btn btn-primary">Cập nhật</button></div></div>
                </form>
        </div>


    </div>
</div>
@endsection