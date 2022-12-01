<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SettingController;
 
Route::get('/', [SettingController::class, 'index']);
Route::get('setting', [SettingController::class, 'setting']);

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
