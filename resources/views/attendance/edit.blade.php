@extends('layouts.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
*{ font-family:'Poppins',sans-serif; box-sizing:border-box; margin:0; padding:0; }

/* ===== WRAPPER ===== */
.app-wrapper{ display:flex; min-height:100vh;     background: #ffc7eb;
    background: linear-gradient(168deg, rgba(255, 199, 235, 1) 0%, rgba(255, 171, 226, 1) 50%, rgba(255, 255, 255, 1) 100%);
; }

/* ===== SIDEBAR ===== */
.sidebar{
    width:250px;
    background: #ff69b4;
    background: linear-gradient(169deg, rgba(255, 105, 180, 1) 52%, rgba(255, 255, 255, 1) 100%)    padding:30px 22px;
    color:white;
    border-top-right-radius:40px;
    border-bottom-right-radius:40px;
    box-shadow:8px 0 25px rgba(255,77,148,.35);
    position:fixed;
    height:100%;
    overflow-y:auto;
}
.sidebar h2{ font-weight:800; margin-bottom:35px; letter-spacing:1px; }
.menu-item{
    display:flex; align-items:center; gap:12px;
    color:white; text-decoration:none; padding:12px 18px;
    border-radius:16px; margin-bottom:10px; font-weight:500;
    transition:all .35s ease; box-shadow:0 4px 12px rgba(0,0,0,0.15);
}
.menu-item:hover, .menu-item.active{ background:rgba(255,255,255,.25); transform:translateX(6px); }

/* ===== MAIN CONTENT ===== */
.main-content{ flex:1; margin-left:250px; padding:35px 45px; overflow-y:auto; }

/* ===== HEADER ===== */
.page-header{ display:flex; align-items:center; gap:12px; margin-bottom:25px; }
.page-header h2{ color:#d63384; font-weight:800; font-size:22px; display:flex; align-items:center; gap:8px; }

/* ===== BUTTON ===== */
.btn-back{ background:#ffe1f1; color:#c2186b; padding:6px 12px; border-radius:12px; text-decoration:none; font-weight:600; display:flex; align-items:center; gap:6px; font-size:14px; }
.btn-back:hover{ background:#ffd3ec; }
.btn-save{ background:linear-gradient(135deg,#ff4fa1,#ff85c2); color:white; border:none; padding:12px 18px; border-radius:16px; font-weight:700; cursor:pointer; display:flex; align-items:center; gap:8px; margin-top:15px; }
.btn-save:hover{ background:#ff2d8b; }

/* ===== CARD & FORM ===== */
.card{ background:white; padding:25px 30px; border-radius:22px; box-shadow:0 15px 35px rgba(0,0,0,.08); border:1px solid #ffd3ec; max-width:600px; }
label{ display:block; margin-top:14px; font-weight:600; color:#c2186b; font-size:14px; }
label i{ margin-right:6px; color:#d63384; }
input, select, textarea{
    width:100%; padding:11px 14px; margin-top:6px; border-radius:12px;
    border:1px solid #ffc1dd; outline:none; font-size:14px;
}
input:focus, select:focus, textarea:focus{ border-color:#ff4fa1; }
textarea{ resize:none; }
</style>

<div class="app-wrapper">

    {{-- SIDEBAR --}}
    <div class="sidebar">
        <h2>Menu</h2>
        <a class="menu-item" href="{{ route('backend.v1.dashboard') }}"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
        <a class="menu-item" href="{{ route('backend.v1.products.index') }}"><i class="fa-solid fa-box"></i> Produk</a>
        <a class="menu-item" href="{{ route('backend.v1.divisions.index') }}"><i class="fa-solid fa-building"></i> Divisi</a>
        <a class="menu-item" href="{{ route('backend.v1.employees.index') }}"><i class="fa-solid fa-users"></i> Karyawan</a>
        <a class="menu-item active" href="{{ route('backend.v1.attendances.index') }}"><i class="fa-solid fa-clock"></i> Absensi</a>
    </div>

    {{-- MAIN CONTENT --}}
    <div class="main-content">

        <div class="page-header">
            <a href="{{ route('backend.v1.attendances.index') }}" class="btn-back"><i class="fa-solid fa-arrow-left"></i></a>
            <h2><i class="fa-solid fa-pen-to-square"></i> Edit Kehadiran</h2>
        </div>

        <div class="card">
            <form method="POST" action="{{ route('backend.v1.attendances.update',$attendance->id) }}">
            @csrf
            @method('PUT')

                <label><i class="fa-solid fa-user"></i> Nama Karyawan</label>
                <input type="text" name="name" value="{{ $attendance->employee->name ?? '' }}" required>

                <label><i class="fa-solid fa-calendar-days"></i> Tanggal</label>
                <input type="date" name="date" value="{{ $attendance->date }}" required>

                <label><i class="fa-solid fa-arrow-right-to-bracket"></i> Jam Masuk</label>
                <input type="time" name="check_in" value="{{ $attendance->check_in }}">

                <label><i class="fa-solid fa-arrow-left-from-bracket"></i> Jam Pulang</label>
                <input type="time" name="check_out" value="{{ $attendance->check_out }}">

                <label><i class="fa-solid fa-circle"></i> Status Kehadiran</label>
                <select name="status" required>
                    <option value="Hadir" {{ $attendance->status=='Hadir'?'selected':'' }}>Hadir</option>
                    <option value="Izin" {{ $attendance->status=='Izin'?'selected':'' }}>Izin</option>
                    <option value="Sakit" {{ $attendance->status=='Sakit'?'selected':'' }}>Sakit</option>
                    <option value="Alpha" {{ $attendance->status=='Alpha'?'selected':'' }}>Alpha</option>
                </select>

                <label><i class="fa-solid fa-note-sticky"></i> Catatan</label>
                <textarea name="notes" rows="3">{{ $attendance->notes }}</textarea>

                <button type="submit" class="btn-save"><i class="fa-solid fa-floppy-disk"></i> Update</button>

            </form>
        </div>

    </div>
</div>

@endsection