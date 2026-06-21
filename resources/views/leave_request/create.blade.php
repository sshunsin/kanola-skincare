@extends('layouts.app')

@section('content')

<h2>Ajukan Izin / Cuti</h2>

<form action="{{ route('backend.v1.leave.store') }}" method="post">
    @csrf

    <input type="hidden" name="employee_id" value="{{ $employee->id }}">

    <p>
        Mulai:
        <input type="date" name="start_date" required>
    </p>

    <p>
        Sampai:
        <input type="date" name="end_date" required>
    </p>

    <p>
        Alasan:
        <textarea name="reason" required></textarea>
    </p>

    <button type="submit">Kirim Pengajuan</button>
</form>

@endsection