<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Setting;

class SettingApi extends Controller
{

    public function index(){
        date_default_timezone_set('Asia/Jakarta');

        $now            = date('Y-m-d');
        $fetch_siang    = Setting::whereDate('tanggal',$now)
                            ->where('status','active')
                            ->where('waktu','siang')
                            ->first();

        $fetch_malam    = Setting::whereDate('tanggal',$now)
                            ->where('status','active')
                            ->where('waktu','malam')
                            ->first();

        if($fetch_siang){
            return response()->json([
                "status_api"    =>"success",
                "code"      =>"200",
                "message"   =>"success get data",
                "id"        =>$fetch_siang->id,
                "waktu"     =>$fetch_siang->waktu,
                "time"      =>$fetch_siang->time,
                "tanggal"   =>$fetch_siang->tanggal,
                "kode"      =>$fetch_siang->kode,
                "status"    =>$fetch_siang->status,
            ], 200);
        }elseif($fetch_malam){
            return response()->json([
                "status_api"    =>"success",
                "code"      =>"200",
                "message"   =>"success get data",
                "id"        =>$fetch_malam->id,
                "waktu"     =>$fetch_malam->waktu,
                "time"      =>$fetch_malam->time,
                "tanggal"   =>$fetch_malam->tanggal,
                "kode"      =>$fetch_malam->kode,
                "status"    =>$fetch_malam->status,
            ], 200);
        }else{
            return response()->json([
                "status_api"    =>"failed",
                "code"      =>"400",
                "message"   =>"data not found",
            ]);
        }
    }

    public function fetch_one($date,$time,$waktu){

        $fetch = Setting::where('status','active')
                ->whereDate('tanggal', $date)
                ->whereTime('time', '<=', $time)
                ->where('status','active')
                ->where('waktu',$waktu)
                ->first();
        if($fetch){
            return response()->json([
                "status_api"    =>"success",
                "code"      =>"200",
                "message"   =>"success get data",
                "id"        =>$fetch->id,
                "waktu"     =>$fetch->waktu,
                "time"      =>$fetch->time,
                "tanggal"   =>$fetch->tanggal,
                "kode"      =>$fetch->kode,
                "status"    =>$fetch->status,
            ], 200);
        }else{
            return response()->json([
                "status_api"    =>"failed",
                "code"      =>"400",
                "message"   =>"failed get data",
            ], 400);
        }
    }
}
