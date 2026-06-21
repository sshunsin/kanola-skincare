<?php

namespace App\Http\Controllers;

use App\Models\ProjectStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectStatusController extends Controller
{
    public function index()
    {
        $statuses = ProjectStatus::orderBy('id', 'asc')->get();
        return view('products.project_status.index', compact('statuses'));
    }

    public function create()
    {
        return view('products.project_status.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        ProjectStatus::create([
            'code' => $validated['code'],
            'name' => $validated['name'],
            'description' => $validated['description'],
            'is_active' => true,
        ]);

        return redirect()->route('backend.v1.projects.status.index')
            ->with('success', 'Status proyek berhasil ditambahkan');
    }

    public function edit($id) 
    {
        $status = ProjectStatus::findOrFail($id);
        return view('products.project_status.edit', compact('status'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $status = ProjectStatus::findOrFail($id);
        
        $status->update([
            'code' => $validated['code'],
            'name' => $validated['name'],
            'description' => $validated['description'],
            'is_active' => true,
        ]);

        return redirect()->route('backend.v1.projects.status.index')
            ->with('success', 'Status proyek berhasil diperbarui');
    }

    public function destroy($id)
    {
        $status = ProjectStatus::findOrFail($id);
        $status->delete();
        
        return redirect()->route('backend.v1.projects.status.index')
            ->with('success', 'Status berhasil dihapus');
    }
}