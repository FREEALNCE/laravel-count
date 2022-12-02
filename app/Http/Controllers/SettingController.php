<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function setting(){
        $data['setting'] = Setting::all();

        return view('setting',$data);
    }

    public function store(Request $request){
        $request->validate([
            'waktu'      => 'required|string',
            'tanggal'    => 'required|date',
            'time'       => 'required',
            'kode'       => 'required|string',
            'status'     => 'required|string',

        ]);

        $save = Setting::insertData($request);

        if($save){
            return redirect()->back()->with('message','success save data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed save data')->with('message_type','warning');
        }
    }

    public function destroy($id){
        $delete = Setting::where('id',$id)->delete();

        if($delete){
            return redirect()->back()->with('message','success delete data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed delete data')->with('message_type','warning');
        }
    }
}
