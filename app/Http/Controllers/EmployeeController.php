<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use App\Models\Division;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('division')->get();
        $divisions = Division::all();

        return view('employees.index', compact('employees','divisions'));
    }

    public function create()
    {
        $users = User::all();
        $divisions = Division::all();

        return view('employees.create', compact('users','divisions'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'user_name'     => 'required',
            'division_id'   => 'required',
            'employee_code' => 'required',
            'position'      => 'required',
            'phone'         => 'required',
            'status'        => 'required'
        ]);

        // @dd($request);
        Employee::create([
            'name'          => $request->user_name,
            'division_id'   => $request->division_id,
            'employee_code' => $request->employee_code,
            'position'      => $request->position,
            'phone'         => $request->phone,
            'status'        => $request->status,
        ]);

        return redirect()
        ->route('backend.v1.employees.index')
        ->with('success','Data karyawan berhasil ditambahkan');
    }

    public function edit(Employee $employee)
    {
        $users = User::all();
        $divisions = Division::all();

        return view('employees.edit', compact('employee','users','divisions'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'user_name'     => 'required',
            'division_id'   => 'required',
            'employee_code' => 'required',
            'position'      => 'required',
            'phone'         => 'required',
            'status'        => 'required'
        ]);

        $employee->update([
            'name'       => $request->user_name,
            'division_id'   => $request->division_id,
            'employee_code' => $request->employee_code,
            'position'      => $request->position,
            'phone'         => $request->phone,
            'status'        => $request->status,
        ]);

        
        return redirect()
            ->route('backend.v1.employees.index')
            ->with('updated','Data karyawan berhasil diperbarui');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return back()->with('deleted','Data karyawan berhasil dihapus');
    }
}