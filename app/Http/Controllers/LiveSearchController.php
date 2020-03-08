<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\User;
use Illuminate\Support\Facades\Auth;

class LiveSearchController extends Controller
{
    public function AdminSearchUser(Request $request)
    {
            if($request->ajax()){
                $result=[];
                $data='';
                // dd($data);
                // dd($request->search);
                $user=User::where('id',$request->search)
                ->orwhere('email','LIKE','%'.$request->search)
                ->orwhere('name','LIKE','%'.$request->search)
                ->orwhereYear('created_at','=',$request->search)
                ->orwhereYear('updated_at','=',$request->search)
                ->get();
                $index=0;
                // dd($user);
                foreach($user as $item)
                {
                    $id=$item->id;
                    $name=$item->name;
                    $email=$item->email;
                    $password=$item->password;
                    $created_at=$item->created_at;
                    $updated_at=$item->updated_at;
                    $data=$data.'
                    <div class="row">
                        <div class="col-md-1 border" style="overflow: hidden">'.$id.'</div>
                        <div class="col-md-2 border" style="overflow: hidden">'.$name.'</div>
                        <div class="col-md-2 border" style="overflow: hidden">'.$email.'</div>
                        <div class="col-md-2 border" style="overflow: hidden">'.$password.'</div>
                        <div class="col-md-1 border" style="overflow: hidden">'.$created_at.'</div>
                        <div class="col-md-1 border" style="overflow: hidden">'.$updated_at.'</div>
                        <div class="col-md-3 border" style="overflow: hidden">
                    <button  class="btn btn-success btnXem" title="Chi tiết" data-id="'.$id.'" ><i class="fa fa-eye"></i></button>
                    <button type="button" data-id="'.$id.'" class="btn btn-primary btnCapquyen" title="Thăng Cấp"><i class="fa fa-key"></i></button>
                    <button type="button" data-id="'.$id.'" class="btn btn-danger" title="Xóa" data-toggle="modal" data-target="#myModal'.$id.'"><i class="fa fa-trash"></i></button>
                    <div class="modal" id="myModal'.$id.'">
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
                                <button type="button" class="btn btn-success btnXoa" data-id="'.$id.'">Có</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Không</button>
                            </div>
                        </div>
                    </div>
                </div>
                        <button type="button" data-id="'.$id.'" class="btn btn-danger btnXoaquyen" title="Giảm Cấp"><i class="fa fa-key"></i></button>
                    </div>
            </div>';
                    $result[$index]=$data;    
                    $index++;  
                }
            }
            return Response($result);
    }
    public function AdminSearchTopic(Request $request)
    {
        // dd($request);
        if($request->ajax()){
            $result=[];
            $data='';
            $user=User::where('email','like','%'.$request->search)->first();
            if($user){
                $topic=Topic::where('userid',$user->id)->get();
                $index=0;
                foreach($topic as $item)
                {
                    $id=$item->id;
                    $threadname=$item->threadname;
                    $name=$user->name;
                    $email=$user->email;
                    $topic='';
                    switch ($item->species) {
                        case '11':
                            $topic='Tạp chí';
                            break;
                        case '12':
                            $topic='Bài báo';
                        break;
                        case '13':
                            $topic='Lý luận';
                        default:
                            $topic='NCKH Sinh viên';
                        break;
                    }
                $point=0.0;
                switch ($item->point) {
                    case 11:
                        $point=0.125;
                        break;
                    case 11:
                        $point=0.25;
                        break;
                    case 11:
                        $point=0.5;
                        break;
                    default:
                        $point=0.75;
                        break;
                }
                $describe=$item->describe;
                $status='';
                if($item->status==12)$status='Đã nghiệm thu';
                else $status='Chưa nghiệm thu';
                $dateOfaccept=$item->dateOfAccept;

                $data= '<div class="row">
                <div class="col-md-1 border" style="overflow: hidden">'.$id.'</div>
                <div class="col-md-1 border" style="overflow: hidden">'.$threadname.'</div>
                <div class="col-md-1 border" style="overflow: hidden">'.$name.'</div>
                <div class="col-md-2 border" style="overflow: hidden">'.$email.'</div>
                <div class="col-md-1 border" style="overflow: hidden">'.$topic.'</div>
            <div class="col-md-1 border" style="overflow: hidden">'.$point.'</div>
                <div class="col-md-2 border" style="overflow: hidden">'.$describe.'</div>
            <div class="col-md-1 border" style="overflow: hidden">'.$status.'</div>
                <div class="col-md-1 border" style="overflow: hidden">'.$dateOfaccept.'</div>
                <div class="col-md-1 border" style="overflow: hidden">
                    <a href="/suadetai/'.$id.'" class="btn btn-success m-1 btnEdit" title="Sửa" data-class="form-control"><span class="fa fa-edit"></span></a>
                    <button class="btn btn-danger m-1 btnDelete" title="Xóa" data-toggle="modal" data-target="#myModal" data-class="form-control"><span class="fa fa-trash"></span></button>
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
                                <a href="/xoadetai/'.$id.'"  type="button" class="btn btn-success">Có</a>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Không</button>
                            </div>
                      
                          </div>
                        </div>
                </div>
            </div>
        </div>';
                }
                $result[$index]=$data;    
                $index++; 
            }
            else
            {
                $topic=Topic::where('id','=',$request->search)
                ->orwhere('threadname','LIKE','%'.$request->search)
                ->orwhere('species','=',$request->search)
                ->orwhere('point','=',$request->search)
                ->orwhere('describe','LIKE','%'.$request->search)
                ->orwhere('status','=',$request->search)
                ->orwhere('dateOfAccept'.'','LIKE','%'.$request->search)
                ->orwhereYear('dateOfAccept','=',$request->search)
                ->get();
            // dd($topic);
            $index=0;
            foreach($topic as $item){
                // dd($user);
                // if($item->user==$user->id){
                $user=User::where('id',$item->userid)->first();
                $id=$item->id;
                $threadname=$item->threadname;
                $name=$user->name;
                $email=$user->email;
                $topic='';
                switch ($item->species) {
                    case '11':
                        $topic='Tạp chí';
                        break;
                    case '12':
                        $topic='Bài báo';
                        break;
                    case '13':
                        $topic='Lý luận';
                    default:
                        $topic='NCKH Sinh viên';
                        break;
                }
                $point=0.0;
                switch ($item->point) {
                    case '11':
                        $point=0.125;
                        break;
                    case '12':
                        $point=0.25;
                        break;
                    case '13':
                        $point=0.5;
                        break;
                    default:
                        $point=0.75;
                        break;
                }
                $describe=$item->describe;
                $status='';
                if($item->status==12)$status='Đã nghiệm thu';
                else $status='Chưa nghiệm thu';
                $dateOfaccept=$item->dateOfAccept;
                $data= '<div class="row">
                <div class="col-md-1 border" style="overflow: hidden">'.$id.'</div>
                <div class="col-md-1 border" style="overflow: hidden">'.$threadname.'</div>
                <div class="col-md-1 border" style="overflow: hidden">'.$name.'</div>
                <div class="col-md-2 border" style="overflow: hidden">'.$email.'</div>
                <div class="col-md-1 border" style="overflow: hidden">'.$topic.'</div>
            <div class="col-md-1 border" style="overflow: hidden">'.$point.'</div>
                <div class="col-md-2 border" style="overflow: hidden">'.$describe.'</div>
            <div class="col-md-1 border" style="overflow: hidden">'.$status.'</div>
                <div class="col-md-1 border" style="overflow: hidden">'.$dateOfaccept.'</div>
                <div class="col-md-1 border" style="overflow: hidden">
                    <a href="/suadetai/'.$id.'" class="btn btn-success m-1 btnEdit" title="Sửa" data-class="form-control"><span class="fa fa-edit"></span></a>
                    <button class="btn btn-danger m-1 btnDelete" title="Xóa" data-toggle="modal" data-target="#myModal" data-class="form-control"><span class="fa fa-trash"></span></button>
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
                                <a href="/xoadetai/'.$id.'"  type="button" class="btn btn-success">Có</a>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Không</button>
                            </div>
                      
                          </div>
                        </div>
                </div>
            </div>
        </div>';
                // dd($data);
                $result[$index]=$data;    
                $index++;            
                }
            }
            return Response($result);
        }
    }
    public function UserSearchTopic(Request $request)
    {
        // dd($request);
        if($request->ajax()){
            // dd($request);
            $result=[];
            $data='';
            $user=Auth::user();
            $searchpoint=0.00;
            if($request->search==0.125)$searchpoint=11;
            if($request->search==0.25)$searchpoint=12;
            if($request->search==0.5)$searchpoint=13;
            if($request->search==0.75)$searchpoint=14;
            $topic=Topic::where('id','LIKE','%'.$request->search)
            ->orwhere('threadname','LIKE','%'.$request->search)
            // ->orwhere('email','LIKE','%'.$request->search)
            // ->orwhere('name','LIKE','%'.$request->search)
            // ->orwhere('email','LIKE','%'.$request->search)
            ->orwhere('species','LIKE','%'.$request->search)
            ->orwhere('point','LIKE','%'.$searchpoint)
            ->orwhere('describe','LIKE','%'.$request->search)
            ->orwhere('status','LIKE','%'.$request->search)
            ->orwhere('dateOfAccept'.'','LIKE','%'.$request->search)
            ->orwhereYear('dateOfAccept','=',$request->search)
            ->get();
            // dd($topic);
            $index=0;
            
            foreach($topic as $item){
                // dd($user);
                if($item->userid==$user->id){
                $id=$item->id;
                $threadname=$item->threadname;
                $name=$user->name;
                $email=$user->email;
                $topic='';
                switch ($item->species) {
                    case '11':
                        $topic='Tạp chí';
                        break;
                    case '12':
                        $topic='Bài báo';
                        break;
                    case '13':
                        $topic='Lý luận';
                    default:
                        $topic='NCKH Sinh viên';
                        break;
                }
                $point=0.0;
                switch ($item->point) {
                    case '11':
                        $point=0.125;
                        break;
                    case '12':
                        $point=0.25;
                        break;
                    case '13':
                        $point=0.5;
                        break;
                    default:
                        $point=0.75;
                        break;
                }
                $describe=$item->describe;
                $status='';
                if($item->status==11)$status='Đã nghiệm thu';
                else $status='Chưa nghiệm thu';
                $dateOfaccept=$item->dateOfAccept;
                // <div class="col-md-1 border">'.$id.'</div>
                $data= '<div class="row">
                
                <div class="col-md-2 border" style="overflow: hidden">'.$threadname.'</div>
                <div class="col-md-1 border" style="overflow: hidden">'.$name.'</div>
                <div class="col-md-2 border" style="overflow: hidden">'.$email.'</div>
                <div class="col-md-1 border" style="overflow: hidden">'.$topic.'</div>
            <div class="col-md-1 border" style="overflow: hidden">'.$point.'</div>
                <div class="col-md-2 border" style="overflow: hidden">'.$describe.'</div>
            <div class="col-md-1 border" style="overflow: hidden">'.$status.'</div>
                <div class="col-md-1 border" style="overflow: hidden">'.$dateOfaccept.'</div>
                <div class="col-md-1 border" style="overflow: hidden">
                    <a href="/suadetai/'.$id.'" class="btn btn-success m-1 btnEdit" title="Sửa" data-class="form-control"><span class="fa fa-edit"></span></a>
                    <button class="btn btn-danger m-1 btnDelete" title="Xóa" data-toggle="modal" data-target="#myModal" data-class="form-control"><span class="fa fa-trash"></span></button>
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
                                <a href="/xoadetai/'.$id.'"  type="button" class="btn btn-success">Có</a>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Không</button>
                            </div>
                      
                          </div>
                        </div>
                </div>
            </div>
        </div>';
                // dd($data);
                $result[$index]=$data;    
                $index++;            
                }
            }
            // dd($result);
            return Response($result);
        }
    }

}
