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

        //FORMAT DATE ASIA JKARTA TIMEZONE
        date_default_timezone_set('Asia/Jakarta');

        $now = date('Y-m-d');
  
        $tommorow = Carbon::tomorrow(); 

        $t = date_format($tommorow,'Y-m-d');

        $yesterday = Carbon::yesterday();

        $y = date_format($yesterday,'Y-m-d');


        //MENAGMBIL KODE UNTUK HARI INI SIANG
        $voucher_siang      = Voucher::where('status','done')
                                ->where('waktu','siang')
                                ->whereDate('tanggal',$now)
                                ->first();

        //MENAGMBIL KODE UNTUK HARI INI MALAM
        $voucher_malam      = Voucher::where('status','done')
                                ->where('waktu','malam')
                                ->whereDate('tanggal',$now)
                                ->first();

        //MENAGMBIL KODE MALAM HARI KEMRIN AGAR KODE PAS MALAM MUNCUL DI HARI BERIKUTNYA
        $voucher_yesterday  = Voucher::where('status','done')
                                ->where('waktu','malam')
                                ->whereDate('tanggal',$y)
                                ->first();

        $voucher_last  = Voucher::where('status','done')
                                ->orderBy('created_at','desc')
                                ->first();

        //JIKA KODE SIANG KOSONG MAKA DI ISI NULL
        if($voucher_siang){
            $kode_siang_yesterday = $voucher_siang->kode;
        }else{
            $kode_siang_yesterday = NULL;
        }

        //INI MENGAMBIL KODE SIANG HARI INI, DAN KODE MALAM KEMRIN JIKA GANTI HARI
        if($voucher_malam){
            $kode_malam_yesterday = $voucher_malam->kode;
        }else{
            if($voucher_yesterday){
                $kode_malam_yesterday = $voucher_yesterday->kode;
            }elseif($voucher_last){
                $kode_malam_yesterday = $voucher_last->kode;
            }
        }

        #UNTUK DI TAMPILKAN DI COUNTER JAM DATA KODE HARI INI

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
                "kode_past_siang"       => $kode_siang_yesterday,
                "kode_past_malam"       => $kode_malam_yesterday
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
                "kode_past_siang"       => $kode_siang_yesterday,
                "kode_past_malam"       => $kode_malam_yesterday
            ], 200);
        }else{

            $history       = Voucher::where('status','done')
                                ->whereDate('created_at',$now)
                                ->orderBy('created_at','desc')
                                ->first();

            $besok_siang = Setting::where('status','active')
                                ->where('waktu','siang')
                                ->whereTime('time','<=',$time)
                                ->first();
            if($history){

                return response()->json([
                    "status_api"            => "success",
                    "code"                  => 200,
                    "message"               => "success get data",
                    "id"                    => $besok_siang->id,
                    "waktu"                 => $besok_siang->waktu,
                    "time"                  => $besok_siang->time,
                    "tanggal"               => $t,
                    "kode"                  => $besok_siang->kode,
                    "status"                => $besok_siang->status,
                    "kode_past_siang"       => $history->kode,
                    "kode_past_malam"       => $history->kode,
                ], 200);

            }else{

                return response()->json([
                    "status_api"            => "success",
                    "code"                  => 200,
                    "message"               => "success get data",
                    "id"                    => $besok_siang->id,
                    "waktu"                 => $besok_siang->waktu,
                    "time"                  => $besok_siang->time,
                    "tanggal"               => $t,
                    "kode"                  => $besok_siang->kode,
                    "status"                => $besok_siang->status,
                    "kode_past_siang"       => $kode_siang_yesterday,
                    "kode_past_malam"       => $kode_malam_yesterday
                ], 200);

            }
        }
    }


    //MEMBUAT HISTORY KUPON
    public function history_create($id){

        date_default_timezone_set('Asia/Jakarta');

        $now = date('Y-m-d');
  
        $tommorow = Carbon::tomorrow(); 

        $t = date_format($tommorow,'Y-m-d');

        $yesterday = Carbon::yesterday();

        $y = date_format($yesterday,'Y-m-d');


        $fetch = Setting::where('id',$id)->first();

        $save = Voucher::create([
            "waktu"     => $fetch->waktu,
            "tanggal"   => $now,
            "kode"      => $fetch->kode,
            "time"      => $fetch->time,
            "status"    => "done",
        ]);

        return $save;
    }


    //TEST FUNGSI DI CRONJOB
    public function test(){
                $time = date('H:i');

                $now = date('Y-m-d');

                $show_siang = Setting::where('status','active')
                        ->where('waktu','siang')
                        ->whereTime('time','<=',$time)
                        ->first();

                $show_malam = Setting::where('status','active')
                        ->where('waktu','malam')
                        ->whereTime('time','<=',$time)
                        ->first();

                if($show_siang){

                    $history_siang    = Voucher::where('status','done')
                                        ->whereDate('tanggal',$now)
                                        ->where('waktu','siang')
                                        ->orderBy('created_at','desc')
                                        ->first();

                    if($history_siang == null){
                        Voucher::history_create($show_siang->id);
                    }
                    elseif($history_siang->kode != $show_siang->kode){
                        Voucher::history_create($show_siang->id);
                    }

                }
                
                if($show_malam){
                    $history_malam    = Voucher::where('status','done')
                                        ->whereDate('tanggal',$now)
                                        ->where('waktu','malam')
                                        ->orderBy('created_at','desc')
                                        ->first();

                    if($history_malam == null){
                        Voucher::history_create($show_siang->id);
                    }
                    elseif($history_malam->kode != $show_malam->kode){
                        Voucher::history_create($show_malam->id);
                    }
                }

        return "TEST";

    }
}
