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
        'kode',
        'time',
        'status',
    ];

    public static function insertData($request){

        $save = Setting::create([
            "waktu"=>$request->waktu,
            "kode"=>$request->kode,
            "time"=>$request->time,
            "status"=>$request->status,
        ]);

        return $save;
    }

    public static function updateData($request){

        $update = Setting::where('id',$request->id)->update([
                "waktu"=>$request->waktu,
                "kode"=>$request->kode,
                "time"=>$request->time,
                "status"=>$request->status,
        ]);

        return $update;
    }
}
