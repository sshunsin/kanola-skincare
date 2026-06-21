<?php

namespace App\Http\Controllers;

use App\Models\DivisionEvaluation;
use Illuminate\Http\Request;

class DivisionEvaluationController extends Controller
{
    public function index()
    {
        $data = DivisionEvaluation::latest()->get();

        $labels = ['Kedisiplinan','Kerjasama','Produktivitas','Kualitas'];

        return view('divisions.division_evaluations.index', [
            'data' => $data,
            'chartLabels' => $labels,
            'chartData' => $data->last()
                ? [
                    $data->last()->kedisiplinan,
                    $data->last()->kerjasama,
                    $data->last()->produktivitas,
                    $data->last()->kualitas
                  ]
                : []
        ]);
    }

    public function create()
    {
        return view('divisions.division_evaluations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_divisi' => 'required',
            'periode' => 'required',
            'kedisiplinan' => 'required|integer|min:0|max:100',
            'kerjasama' => 'required|integer|min:0|max:100',
            'produktivitas' => 'required|integer|min:0|max:100',
            'kualitas' => 'required|integer|min:0|max:100',
        ]);

        DivisionEvaluation::create($request->all());

        return redirect()
            ->route('backend.v1.analytics.evaluations.index')
            ->with('success','Evaluasi divisi berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view(
            'divisions.division_evaluations.edit',
            ['item' => DivisionEvaluation::findOrFail($id)]
        );
    }

    public function update(Request $request, $id)
    {
        DivisionEvaluation::findOrFail($id)
            ->update($request->all());

        return redirect()
            ->route('backend.v1.analytics.evaluations.index')
            ->with('success','Evaluasi divisi berhasil diupdate');
    }

    public function destroy($id)
    {
        DivisionEvaluation::destroy($id);

        return redirect()
            ->route('backend.v1.analytics.evaluations.index')
            ->with('success','Evaluasi divisi berhasil dihapus');
    }
}