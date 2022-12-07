<?php

namespace App\Console;

use Illuminate\Support\Facades\Log;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;
use App\Models\Voucher;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        //CRONJOB DIGUNAKAN UNTUK MENGUPDATE WAKTU JIKA FILE JS TIDAK DI EKSEKUSI
        //KEKURANGAN FILE JS HANYA DI EKSEKUSI KETIKA PAGE TERSEBUT DIBUKA, JIKA TIDAK DIBUKA MAKA KODE OTOMATIS DI JALANKAN OLEH CRONJOB
        date_default_timezone_set('Asia/Jakarta');


        $schedule->call(function () {

                $time = date('H:i:s');

                $now = date('Y-m-d');

                $show_siang = Setting::where('status','active')
                        ->where('waktu','siang')
                        ->whereTime('time','>=',$time)
                        ->first();

                $show_malam = Setting::where('status','active')
                        ->where('waktu','malam')
                        ->whereTime('time','>=',$time)
                        ->first();

                if($show_siang){

                    $history_siang    = Voucher::where('status','done')
                                        ->whereDate('created_at',$now)
                                        ->where('waktu','siang')
                                        ->first();

                    if($history_siang == null){
                        Voucher::history_create($show_siang->id);
                    }
                    elseif($history_siang->kode != $show_siang->kode){
                        Voucher::history_create($show_siang->id);
                    }

                }elseif($show_malam){
                    $history_malam    = Voucher::where('status','done')
                                        ->whereDate('created_at',$now)
                                        ->where('waktu','malam')
                                        ->first();

                    if($history_malam == null){
                        Voucher::history_create($show_siang->id);
                    }
                    elseif($history_malam->kode != $show_malam->kode){
                        Voucher::history_create($show_malam->id);
                    }
                }

        })->everyTwoMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

   
}
