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

        //CRONJOB DIGUNAKAN UNTUK MENGUPDATE HISTORY KOSE SESUAI WAKTU JIKA FILE JS TIDAK DI EKSEKUSI
        //KEKURANGAN FILE JS HANYA DI EKSEKUSI KETIKA PAGE TERSEBUT DIBUKA, JIKA TIDAK DIBUKA MAKA KODE OTOMATIS DI JALANKAN OLEH CRONJOB DAN DI UPDATE DI HISTORY KUPON
        date_default_timezone_set('Asia/Jakarta');


        $schedule->call(function () {

            //DEKLARASI WAKTU DAN TANGGAL
            $time = date('H:i');

            $now = date('Y-m-d');

            //CHECK WAKTU SIANG DAN KODE 
            $show_siang = Setting::where('status','active')
                    ->where('waktu','siang')
                    ->whereTime('time','<=',$time)
                    ->first();

            //CHECK WAKTU MALAM DAN KODE 
            $show_malam = Setting::where('status','active')
                    ->where('waktu','malam')
                    ->whereTime('time','<=',$time)
                    ->first();

            // AKAN MENAMBAHKAN JIKA KODE TIDAK TEREKSEKUSI
            if($show_siang){

                $history_siang    = Voucher::where('status','done')
                                    ->whereDate('tanggal',$now)
                                    ->where('waktu','siang')
                                    ->orderBy('created_at','desc')
                                    ->first();

                //AKAN MENAMBAHKAN HISTORY JIKA HISTORY HARI INI TIDAK ADA DAN SUDAH ADA TAPI KODE BERBEDA
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

                //AKAN MENAMBAHKAN HISTORY JIKA HISTORY HARI INI TIDAK ADA DAN SUDAH ADA TAPI KODE BERBEDA
                if($history_malam == null){
                    Voucher::history_create($show_siang->id);
                }
                elseif($history_malam->kode != $show_malam->kode){
                    Voucher::history_create($show_malam->id);
                }
            }

        })->everyFiveMinutes();
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
