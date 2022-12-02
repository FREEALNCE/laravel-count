<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Setting;
use App\Models\Voucher;
use Carbon\Carbon;

class SettingApi extends Controller
{

    //MENGAMBIL DATA KUPON DAN TANGGAL DAN WAKTU
    public function index($time){
        date_default_timezone_set('Asia/Jakarta');

        $now        = Carbon::now();
        $yesterday  = Carbon::yesterday();
        $tomorrow   = Carbon::tomorrow();

        $now                = date('Y-m-d');
        $voucher_siang      = Voucher::where('status','done')
                                ->where('waktu','siang')
                                ->whereDate('tanggal',$now)
                                ->first();

        $voucher_malam      = Voucher::where('status','done')
                                ->where('waktu','malam')
                                ->whereDate('tanggal',$yesterday)
                                ->first();

        if($voucher_siang){
            $kode_siang_yesterday = $voucher_siang->kode;
        }else{
            $kode_siang_yesterday = NULL;
        }

        if($voucher_malam){
            $kode_malam_yesterday = $voucher_malam->kode;
        }else{
            $kode_malam_yesterday = NULL;
        }

        #UNTUK DI TAMPILKAN 

        $show_siang         = Setting::where('status','active')
                                ->where('waktu','siang')
                                ->whereTime('time','>=',$time)
                                ->first();

        $show_malam         = Setting::where('status','active')
                                ->where('waktu','malam')
                                ->whereTime('time','>=',$time)
                                ->first();

        if($show_siang){
            return response()->json([
                "status_api"            => "success",
                "code"                  => 200,
                "message"               => "success get data",
                "id"                    => $show_siang->id,
                "waktu"                 => $show_siang->waktu,
                "time"                  => $show_siang->time,
                "tanggal"               => $now,
                "kode"                  => $show_siang->kode,
                "status"                => $show_siang->status,
                "kode_past_siang"  => $kode_siang_yesterday,
                "kode_past_malam"  => $kode_malam_yesterday
            ], 200);
        }elseif($show_malam){
            return response()->json([
                "status_api"            => "success",
                "code"                  => "200",
                "message"               => "success get data",
                "id"                    => $show_malam->id,
                "waktu"                 => $show_malam->waktu,
                "time"                  => $show_malam->time,
                "tanggal"               => $now,
                "kode"                  => $show_malam->kode,
                "status"                => $show_malam->status,
                "kode_past_siang"  => $kode_siang_yesterday,
                "kode_past_malam"  => $kode_malam_yesterday
            ], 200);
        }else{
            return response()->json([
                "status_api"    =>"failed",
                "code"      =>"400",
                "message"   =>"data not found",
            ]);
        }
    }


    //MEMBUAT HISTORY KUPON
    public function history_create($id){

        date_default_timezone_set('Asia/Jakarta');
        $now        = Carbon::now();
        $yesterday  = Carbon::yesterday();
        $tomorrow   = Carbon::tomorrow();


        $fetch = Setting::where('id',$id)->first();

        $save = Voucher::create([
            "waktu"     => $fetch->waktu,
            "tanggal"   => $now,
            "kode"      => $fetch->kode,
            "time"      => $fetch->time,
            "status"    => "done",
        ]);

        return $update;
    }
}
