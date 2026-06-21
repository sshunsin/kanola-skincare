<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function index(){
        $monitorings = Monitoring::latest()->paginate(10);
        return view('monitoring.index',compact('monitorings'));
    }

    public function create(){
        return view('monitoring.create');
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'status'=>'required'
        ]);

        Monitoring::create($request->all());

        return redirect()->route('monitoring.index')
        ->with('success','Data monitoring berhasil ditambahkan 💗');
    }

    public function edit($id){
        $data = Monitoring::findOrFail($id);
        return view('monitoring.edit',compact('data'));
    }

    public function update(Request $request,$id){
        $data = Monitoring::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('monitoring.index')
        ->with('success','Data monitoring berhasil diperbarui 💗');
    }

    public function destroy($id){
        Monitoring::destroy($id);

        return redirect()->route('monitoring.index')
        ->with('success','Data monitoring dihapus 💗');
    }
}