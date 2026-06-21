<?php

namespace App\Http\Controllers;

use App\Models\DivisionEmployeeCount;
use Illuminate\Http\Request;

class DivisionEmployeeCountController extends Controller
{
    public function index()
    {
        $data = DivisionEmployeeCount::all();

        return view('divisions.division_employee_counts.index', [
            'data' => $data,
            'labels' => $data->pluck('nama_divisi'),
            'values' => $data->pluck('jumlah_karyawan')
        ]);
    }

    public function create()
    {
        return view('divisions.division_employee_counts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_divisi' => 'required',
            'jumlah_karyawan' => 'required|integer|min:0'
        ]);

        DivisionEmployeeCount::create($request->all());

        return redirect()
            ->route('backend.v1.analytics.employee-counts.index')
            ->with('success','Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view(
            'divisions.division_employee_counts.edit',
            ['item' => DivisionEmployeeCount::findOrFail($id)]
        );
    }

    public function update(Request $request, $id)
    {
        DivisionEmployeeCount::findOrFail($id)
            ->update($request->all());

        return redirect()
            ->route('backend.v1.analytics.employee-counts.index')
            ->with('success','Data berhasil diupdate');
    }

    public function destroy($id)
    {
        DivisionEmployeeCount::destroy($id);

        return redirect()
            ->route('backend.v1.analytics.employee-counts.index')
            ->with('success','Data berhasil dihapus');
    }
}