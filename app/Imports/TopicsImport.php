<?php

namespace App\Imports;

use App\Topic;
use App\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TopicsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        // $temp=[$row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6]];
        // dd($temp);
        $user=User::where('email',$row[4])->first();
        $species=14;
        switch (strtolower($row[1])) {
            case 'tạp chí':
                $species=14;
                break;
            
            case 'bài báo':
                $species=12;
                break;
            case 'lý luận':
                $species=13;
                break;
            default:
                $species=14;
                break;
        }
        $point=11;
        switch ($row[2]) {
            case '0.125':
                $point=11;
                break;
            case '0.25':
                $point=12;
                break;
            case '0.5':
                $point=13;
                break;
            default:
                $point=14;
                break;
        }
        $status=11;
        if(strtolower($row[5])=='đã nghiệm thu')$status=12;
        if($user)
        {
            return new Topic([
                'threadname'=>$row[0],
                'species'=>$species,
                'point'=>$point,
                'describe'=>$row[3],
                'userid'=>$user->id,
                'status'=>$status,
                'dateOfAccept'=>$row[6],
                'created_at'=>Carbon::now()
            ]);
        }
        else
        {
            return null;
        }
    }
}
