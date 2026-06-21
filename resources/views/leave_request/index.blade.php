@extends('layouts.app')

@section('content')

<h2>Daftar Pengajuan Cuti</h2>

@if(session('success'))
<div style="color: green">
    {{ session('success') }}
</div>
@endif

<table border="1" cellpadding="8">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Alasan</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($leaveRequests as $lr)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $lr->employee->user->name }}</td>
        <td>{{ $lr->start_date }} s/d {{ $lr->end_date }}</td>
        <td>{{ $lr->reason }}</td>

        <td>
            @if($lr->status == 'pending')
                <span style="color: orange">Pending</span>
            @elseif($lr->status == 'approved')
                <span style="color: green">Approved</span>
            @else
                <span style="color: red">Rejected</span>
            @endif
        </td>

        <td>
            <a href="{{ route('backend.v1.leave.show',$lr->id) }}">Detail</a>
        </td>
    </tr>
    @endforeach

</table>

@if(auth()->user()->role == 'staff')
<br>
<a href="{{ route('backend.v1.leave.create') }}">
    + Ajukan Cuti
</a>
@endif

@endsection