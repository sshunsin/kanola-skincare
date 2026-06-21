<?php

namespace App\Http\Controllers;

use App\Models\ProjectProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectProgressController extends Controller
{
    public function index()
    {
        $progresses = DB::table('project_progress')
        ->orderBy(DB::raw("SUBSTRING_INDEX(code, '-', -3)"), 'asc')
        ->orderBy(DB::raw("CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(code, '-', 2), '-', -1) AS UNSIGNED)"), 'asc')
        ->get();
        return view('products.project_progress.index', compact('progresses'));
    }

    public function create()
    {
        return view('products.project_progress.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:project_progress',
            'stage' => 'required',
            'progress_percent' => 'required|integer|min:0|max:100',
            'update_date' => 'required|date'
        ]);

        $status = $this->setStatus($request->progress_percent);

        ProjectProgress::create([
            'code' => $request->code,
            'stage' => $request->stage,
            'progress_percent' => $request->progress_percent,
            'status' => $status,
            'description' => $request->description,
            'update_date' => $request->update_date,
        ]);

        return redirect()->route('backend.v1.projects.progress.index')
            ->with('success','Progress proyek berhasil ditambahkan');
    }

    public function edit(ProjectProgress $progress)
    {
        $projectProgress = $progress;
        return view('products.project_progress.edit', compact('projectProgress'));
    }

    public function update(Request $request, ProjectProgress $progress)
    {
        $request->validate([
            'code' => 'required|unique:project_progress,code,' . $progress->id,
            'stage' => 'required',
            'progress_percent' => 'required|integer|min:0|max:100',
            'update_date' => 'required|date'
        ]);

        $status = $this->setStatus($request->progress_percent);

        $progress->update([
            'code' => $request->code,
            'stage' => $request->stage,
            'progress_percent' => $request->progress_percent,
            'status' => $status,
            'description' => $request->description,
            'update_date' => $request->update_date,
        ]);

        return redirect()->route('backend.v1.projects.progress.index')
            ->with('success','Progress proyek berhasil diperbarui');
    }

    public function destroy(ProjectProgress $progress)
    {
        $progress->delete();
        return back()->with('success','Progress proyek berhasil dihapus');
    }

    private function setStatus($percent)
    {
        if ($percent == 0) return 'not_started';
        if ($percent >= 100) return 'completed';
        return 'on_progress';
    }
}