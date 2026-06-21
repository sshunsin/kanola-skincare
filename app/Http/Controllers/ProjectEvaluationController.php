<?php

namespace App\Http\Controllers;

use App\Models\ProjectEvaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectEvaluationController extends Controller
{
    public function index()
    {
        $evaluations = DB::table('project_evaluations')
        ->orderBy(DB::raw("SUBSTRING_INDEX(code, '-', -3)"), 'asc')
        ->orderBy(DB::raw("CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(code, '-', 2), '-', -1) AS UNSIGNED)"), 'asc')
        ->get();
        return view('products.project_evaluation.index', compact('evaluations'));
    }

    public function create()
    {
        return view('products.project_evaluation.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:project_evaluations',
            'score' => 'required|integer|min:0|max:100',
            'risk_level' => 'required',
            'quality' => 'required',
            'decision' => 'required',
            'evaluation_date' => 'required|date'
        ]);

        ProjectEvaluation::create($request->all());

        return redirect()->route('backend.v1.projects.evaluation.index')
            ->with('success','Evaluasi proyek berhasil disimpan');
    }

    public function edit(ProjectEvaluation $evaluation)
    {
        $projectEvaluation = $evaluation;
        return view('products.project_evaluation.edit', compact('projectEvaluation'));
    }

    public function update(Request $request, ProjectEvaluation $evaluation)
    {
        $request->validate([
            'code' => 'required|unique:project_evaluations,code,' . $evaluation->id,
            'score' => 'required|integer|min:0|max:100',
            'risk_level' => 'required',
            'quality' => 'required',
            'decision' => 'required',
            'evaluation_date' => 'required|date'
        ]);

        $evaluation->update($request->all());

        return redirect()->route('backend.v1.projects.evaluation.index')
            ->with('success','Evaluasi proyek berhasil diperbarui');
    }

    public function destroy(ProjectEvaluation $evaluation)
    {
        $evaluation->delete();
        return back()->with('success','Evaluasi proyek berhasil dihapus');
    }
}