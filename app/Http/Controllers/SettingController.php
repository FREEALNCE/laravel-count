<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Setting;
use App\Models\Voucher;

class SettingController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function setting(){
        $data['setting'] = Setting::orderBy('time','asc')->get();
        $data['voucher'] = Voucher::all();

        return view('setting',$data);
    }

    public function edit($id){
        $data['row'] = Setting::find($id);

        return view('edit',$data);
    }

    public function store(Request $request){
        $request->validate([
            'waktu'      => 'required|string',
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

    public function update(Request $request){
        $request->validate([
            'id'         => 'required',
            'waktu'      => 'required|string',
            'time'       => 'required',
            'kode'       => 'required|string',
            'status'     => 'required|string',

        ]);

        $update = Setting::updateData($request);

        if($update){
            return redirect()->back()->with('message','success update data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed update data')->with('message_type','warning');
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
