<?php

namespace App\Http\Controllers;

use App\Models\ProjectTimeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectTimelineController extends Controller
{
    public function index()
    {
        $timelines = DB::table('project_timelines')
        ->orderBy(DB::raw("SUBSTRING_INDEX(code, '-', -3)"), 'asc')
        ->orderBy(DB::raw("CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(code, '-', 2), '-', -1) AS UNSIGNED)"), 'asc')
        ->get();
        return view('products.project_timeline.index', compact('timelines'));
    }

    public function create()
    {
        return view('products.project_timeline.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:project_timelines',
            'title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date'
        ]);

        ProjectTimeline::create($request->all());

        return redirect()->route('backend.v1.projects.timeline.index')
            ->with('success','Timeline proyek berhasil ditambahkan');
    }

    public function edit(ProjectTimeline $timeline)
    {
        return view('products.project_timeline.edit', compact('timeline'));
    }

    public function update(Request $request, ProjectTimeline $timeline)
    {
        $request->validate([
            'code' => 'required|unique:project_timelines,code,' . $timeline->id,
            'title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date'
        ]);

        $timeline->update($request->all());

        return redirect()->route('backend.v1.projects.timeline.index')
            ->with('success','Timeline proyek berhasil diperbarui');
    }

    public function destroy(ProjectTimeline $timeline)
    {
        $timeline->delete();
        return back()->with('success','Timeline proyek berhasil dihapus');
    }
}