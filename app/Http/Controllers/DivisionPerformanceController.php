<?php

namespace App\Http\Controllers;

use App\Models\DivisionPerformance;
use Illuminate\Http\Request;

class DivisionPerformanceController extends Controller
{
    public function index()
    {
        $data = DivisionPerformance::orderBy('periode')->get();

        return view('divisions.division_performances.index', [
            'data' => $data,
            'labels' => $data->pluck('periode'),
            'values' => $data->pluck('nilai_kinerja')
        ]);
    }

    public function create()
    {
        return view('divisions.division_performances.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_divisi' => 'required',
            'periode' => 'required',
            'nilai_kinerja' => 'required|integer|min:0|max:100'
        ]);

        DivisionPerformance::create($request->all());

        return redirect()
            ->route('backend.v1.analytics.performances.index')
            ->with('success','Data kinerja berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view(
            'divisions.division_performances.edit',
            ['item' => DivisionPerformance::findOrFail($id)]
        );
    }

    public function update(Request $request, $id)
    {
        DivisionPerformance::findOrFail($id)
            ->update($request->all());

        return redirect()
            ->route('backend.v1.analytics.performances.index')
            ->with('success','Data kinerja berhasil diupdate');
    }

    public function destroy($id)
    {
        DivisionPerformance::destroy($id);

        return redirect()
            ->route('backend.v1.analytics.performances.index')
            ->with('success','Data kinerja berhasil dihapus');
    }
}