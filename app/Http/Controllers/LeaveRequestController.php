<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    /**
     * List semua pengajuan cuti
     */
    public function index()
    {
        $leaveRequests = LeaveRequest::with('employee.user')->latest()->get();

        return view('leave_request.index', compact('leaveRequests'));
    }

    /**
     * Form pengajuan cuti
     */
    public function create()
    {
        $employee = Employee::where('user_id', auth()->id())->first();

        return view('leave_request.create');
    }

    /**
     * Simpan pengajuan cuti
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'reason'      => 'required',
        ]);

        LeaveRequest::create([
            'employee_id' => $request->employee_id,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
            'reason'      => $request->reason,
            'status'      => 'pending'
        ]);

        return redirect()->route('backend.v1.leave.index')
            ->with('success', 'Pengajuan cuti berhasil dikirim.');
    }

    /**
     * Detail pengajuan
     */
    public function show($id)
    {
        $leave = LeaveRequest::with('employee.user')->findOrFail($id);

        return view('leave_request.show', compact('leaveRequest'));
    }

    /**
     * Approve
     */
    public function approve($id)
    {
        $leave = LeaveRequest::findOrFail($id);
        $leave->update(['status' => 'approved']);

        return back()->with('success', 'Cuti disetujui');
    }

    /**
     * Reject
     */
    public function reject($id)
    {
        $leave = LeaveRequest::findOrFail($id);
        $leave->update(['status' => 'rejected']);

        return back()->with('success', 'Cuti ditolak');
    }

    /**
     * Hapus
     */
    public function destroy($id)
    {
        LeaveRequest::destroy($id);

        return back()->with('success', 'Data berhasil dihapus');
    }
}