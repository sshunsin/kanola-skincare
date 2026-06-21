<?php

namespace App\Http\Controllers;

use App\Models\DivisionTarget;
use Illuminate\Http\Request;

class DivisionTargetController extends Controller
{
    public function index()
    {
        $data = DivisionTarget::orderBy('periode')->get();

        return view('divisions.division_targets.index', [
            'data' => $data,
            'labels' => $data->pluck('periode'),
            'target' => $data->pluck('target'),
            'realisasi' => $data->pluck('realisasi')
        ]);
    }

    public function create()
    {
        return view('divisions.division_targets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_divisi' => 'required',
            'periode' => 'required',
            'target' => 'required|integer|min:0',
            'realisasi' => 'required|integer|min:0'
        ]);

        DivisionTarget::create($request->all());

        return redirect()
            ->route('backend.v1.analytics.targets.index')
            ->with('success','Target divisi berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view(
            'divisions.division_targets.edit',
            ['item' => DivisionTarget::findOrFail($id)]
        );
    }

    public function update(Request $request, $id)
    {
        DivisionTarget::findOrFail($id)
            ->update($request->all());

        return redirect()
            ->route('backend.v1.analytics.targets.index')
            ->with('success','Target divisi berhasil diupdate');
    }

    public function destroy($id)
    {
        DivisionTarget::destroy($id);

        return redirect()
            ->route('backend.v1.analytics.targets.index')
            ->with('success','Target divisi berhasil dihapus');
    }
}