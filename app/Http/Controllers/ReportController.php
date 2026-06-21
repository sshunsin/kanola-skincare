<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        $reports = Report::latest()->paginate(10);
        return view('reports.index',compact('reports'));
    }

    public function create(){
        return view('reports.create');
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'report_date'=>'required'
        ]);

        Report::create($request->all());

        return redirect()->route('reports.index')
        ->with('success','Laporan berhasil ditambahkan 💗');
    }

    public function edit($id){
        $data = Report::findOrFail($id);
        return view('reports.edit',compact('data'));
    }

    public function update(Request $request,$id){
        $data = Report::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('reports.index')
        ->with('success','Laporan berhasil diperbarui 💗');
    }

    public function destroy($id){
        Report::destroy($id);

        return redirect()->route('reports.index')
        ->with('success','Laporan dihapus 💗');
    }
}