<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Voucher extends Model
{
    use HasFactory;

    protected $table = 'voucher';

    protected $fillable = [
        'waktu',
        'tanggal',
        'kode',
        'time',
        'status',
    ];

    public static function insertData($request){

        $save = Voucher::create([
            "waktu"     =>$request['waktu'],
            "tanggal"   =>$request['tanggal'],
            "kode"      =>$request['kode'],
            "time"      =>$request['time'],
            "status"    =>$request['status'],
        ]);

        return $save;
    }

    public static function history_create($id){

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
}
