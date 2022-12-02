<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SettingController;
use App\Http\Controllers\VoucherController;
 
Route::get('/', [SettingController::class, 'index']);
Route::get('setting', [SettingController::class, 'setting']);
Route::post('setting/store', [SettingController::class, 'store']);
Route::post('setting/update', [SettingController::class, 'update']);
Route::get('setting/destroy/{id}', [SettingController::class, 'destroy']);

Route::get('voucher/destroy/{id}', [VoucherController::class, 'destroy']);

Route::get('setting/edit/{id}', [SettingController::class, 'edit']);
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
