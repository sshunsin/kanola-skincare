<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::all();
        return view('divisions.index', compact('divisions'));
    }

    public function create()
    {
        return view('divisions.create');
    }

    public function store(Request $request)
    {
        Division::create($request->all());
        return redirect()->route('backend.v1.divisions.index');
    }

    public function edit(Division $division)
    {
        return view('divisions.edit', compact('division'));
    }

    public function update(Request $request, Division $division)
    {
        $division->update($request->all());
        return redirect()->route('backend.v1.divisions.index');
    }
    
    public function destroy(Division $division)
    {
        $division->delete();
        return redirect()->route('backend.v1.divisions.index');
    }


    
}