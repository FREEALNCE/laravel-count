<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
