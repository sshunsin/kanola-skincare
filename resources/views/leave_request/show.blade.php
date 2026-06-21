@extends('layouts.app')

@section('content')

<h2>Detail Pengajuan Cuti</h2>

<p>Nama: <strong>{{ $leaveRequest->employee->user->name }}</strong></p>
<p>Tanggal: {{ $leaveRequest->start_date }} s/d {{ $leaveRequest->end_date }}</p>
<p>Alasan: {{ $leaveRequest->reason }}</p>
<p>Status: <strong>{{ $leaveRequest->status }}</strong></p>

<hr>

@if(auth()->user()->role == 'admin' 
|| auth()->user()->role == 'manager' 
|| auth()->user()->role == 'hrd')

    @if($leaveRequest->status == 'pending')

        <form action="{{ route('backend.v1.leave.approve', $leaveRequest->id) }}" method="post" style="display:inline;">
            @csrf
            <button type="submit">Approve</button>
        </form>

        <form action="{{ route('backend.v1.leave.reject', $leaveRequest->id) }}" method="post" style="display:inline;">
            @csrf
            <button type="submit">Reject</button>
        </form>

    @endif

@endif

<br><br>

<a href="{{ route('backend.v1.leave.index') }}">← Kembali</a>

@endsection