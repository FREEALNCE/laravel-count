<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'setting';

    protected $fillable = [
        'waktu',
        'tanggal',
        'kode',
        'time',
        'status',
    ];

    public static function insertData($request){

        $save = Setting::create([
            "waktu"=>$request->waktu,
            "tanggal"=>$request->tanggal,
            "kode"=>$request->kode,
            "time"=>$request->time,
            "status"=>$request->status,
        ]);

        return $save;
    }
}
