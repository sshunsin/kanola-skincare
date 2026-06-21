@extends('layouts.app')

@section('content')

<!-- GOOGLE FONT -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;800&display=swap" rel="stylesheet">

<!-- FONT AWESOME ICON -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

<style>
* { font-family:'Poppins',sans-serif; margin:0; padding:0; box-sizing:border-box; }

body { background: linear-gradient(160deg,#ff5fa2,#ffe3f3,#ffffff); }

.layout-wrapper { display:flex; min-height:100vh; }

/* ===== SIDEBAR ===== */
.sidebar{
    width:250px;
    background: #ff69b4;
    background: linear-gradient(169deg, rgba(255, 105, 180, 1) 52%, rgba(255, 255, 255, 1) 100%)
    color:white;
    padding:30px 22px;
    position:sticky;
    top:0;
    border-top-right-radius:40px;
    border-bottom-right-radius:40px;
    box-shadow:8px 0 25px rgba(255,77,148,.35);
    overflow-y:auto;
}

.sidebar::after{
    content:'';
    position:absolute;
    top:0;
    right:-25px;
    width:50px;
    height:100%;
    background:rgba(255,255,255,.25);
    border-radius:50%;
    filter:blur(25px);
}

.sidebar h2{
    font-weight:800;
    margin-bottom:35px;
    letter-spacing:1px;
}

.sidebar a{
    display:flex;
    align-items:center;
    gap:12px;
    color:white;
    text-decoration:none;
    padding:12px 18px;
    border-radius:16px;
    margin-bottom:10px;
    font-weight:500;
    transition:all .35s ease;
    box-shadow:0 4px 12px rgba(0,0,0,0.15);
}

.sidebar a:hover{
    background: rgba(255,255,255,.25);
    transform:translateX(6px);
}

.sidebar a i{
    width:22px;
    font-size:16px;
}

/* ===== MAIN CONTENT ===== */
.dashboard-container{
    flex:1;
    padding:40px 45px;
    overflow-y:auto;
}

h1{ font-weight:800; color:#d63384; margin-bottom:25px; }

/* ===== CARD ===== */
.card{
    background:white;
    padding:25px;
    border-radius:18px;
    box-shadow:0 15px 35px rgba(0,0,0,.08);
    border:1px solid #ffd3ec;
    margin-bottom:30px;
}

/* ===== FORM ===== */
.form-group{
    margin-bottom:18px;
}

label{
    display:block;
    font-weight:600;
    margin-bottom:6px;
    color:#c2186b;
}

input[type="text"], input[type="number"], textarea, select{
    width:100%;
    padding:10px 14px;
    border-radius:14px;
    border:1px solid #ffd3ec;
    background:#fff7fc;
    font-size:14px;
    transition:all .3s;
}

input[type="text"]:focus, input[type="number"]:focus, textarea:focus, select:focus{
    outline:none;
    border-color:#ff85c2;
    box-shadow:0 0 8px rgba(255,79,161,.3);
}

textarea{ min-height:80px; resize:none; }

/* ===== BUTTON ===== */
.btn{
    padding:9px 18px;
    border-radius:14px;
    font-size:14px;
    font-weight:600;
    border:none;
    cursor:pointer;
    transition:all .3s;
}

.btn-save{
    background:linear-gradient(135deg,#ff4fa1,#ff85c2);
    color:white;
    box-shadow:0 6px 18px rgba(255,79,161,.35);
}

.btn-save:hover{
    transform:translateY(-2px);
}

.btn-back{
    background:#ffe1f1;
    color:#c2186b;
    margin-right:10px;
}

/* ===== TABLE INSPIRED STYLE (optional preview) ===== */
table{
    width:100%;
    border-collapse:collapse;
    background:white;
    border-radius:12px;
    overflow:hidden;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
}

th{
    background:#ffe0f0;
    padding:14px;
    text-align:left;
    font-weight:700;
    color:#c2186b;
}

td{
    padding:12px 14px;
    border-bottom:1px solid #ffe6f3;
    vertical-align:middle;
}

tr:last-child td{
    border-bottom:none;
}

tr:nth-child(even){
    background:#fff7fc;
}
</style>

<div class="layout-wrapper">

{{-- SIDEBAR --}}
<div class="sidebar">
    <h2>Menu</h2>
    <a href="{{ route('backend.v1.dashboard') }}"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
    <a href="{{ route('backend.v1.products.index') }}"><i class="fa-solid fa-box"></i> Produk</a>
    <a href="{{ route('backend.v1.divisions.index') }}"><i class="fa-solid fa-building"></i> Divisi</a>
    <a href="{{ route('backend.v1.employees.index') }}"><i class="fa-solid fa-user-tie"></i> Karyawan</a>
    <a href="{{ route('backend.v1.attendances.index') }}"><i class="fa-solid fa-clock"></i> Absensi</a>
</div>

{{-- CONTENT --}}
<div class="dashboard-container">

<h1>Edit Divisi: {{ $division->name }}</h1>

<div class="card">
    <form method="POST" action="{{ route('backend.v1.divisions.update', $division->id) }}">
        @csrf
        @method('PUT')

        {{-- STRUKTUR & FUNGSI --}}
        <h2 style="color:#d63384; margin-bottom: 15px;">Struktur & Fungsi Divisi</h2>
        <div class="form-grid">
            <div>
                <label>Kode Divisi</label>
                <input type="text" name="code" value="{{ $division->code }}" required>
            </div>

            <div>
                <label>Nama Divisi</label>
                <input type="text" name="name" value="{{ $division->name }}" required>
            </div>

            <div>
                <label>Parent Divisi</label>
                <input type="text" name="parent" value="{{ $division->parent }}">
            </div>

            <div>
                <label>Level</label>
                <select name="level">
                    <option value="Direktorat" {{ $division->level == 'Direktorat' ? 'selected' : '' }}>Direktorat</option>
                    <option value="Departemen" {{ $division->level == 'Departemen' ? 'selected' : '' }}>Departemen</option>
                    <option value="Sub Divisi" {{ $division->level == 'Sub Divisi' ? 'selected' : '' }}>Sub Divisi</option>
                </select>
            </div>

            <div class="form-full">
                <label>Fungsi Utama</label>
                <textarea name="main_function">{{ $division->main_function }}</textarea>
            </div>

            <div class="form-full">
                <label>Ruang Lingkup</label>
                <textarea name="scope">{{ $division->scope }}</textarea>
            </div>

            <div>
                <label>Status</label>
                <select name="status">
                    <option value="Aktif" {{ $division->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Nonaktif" {{ $division->status == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>
        </div>

        {{-- OPERASIONAL & KPI --}}
        <h2 style="color:#d63384; margin-bottom: 15px; margin-top: 30px;">Operasional & KPI Divisi</h2>
        <div class="form-grid">
            <div>
                <label>Manager</label>
                <input type="text" name="manager" value="{{ $division->manager }}">
            </div>

            <div>
                <label>Jumlah Staff</label>
                <input type="number" name="staff" value="{{ $division->staff }}">
            </div>

            <div>
                <label>Anggaran</label>
                <input type="number" name="budget" value="{{ $division->budget }}">
            </div>

            <div>
                <label>Target KPI</label>
                <input type="text" name="target_kpi" value="{{ $division->target_kpi }}">
            </div>

            <div>
                <label>Capaian</label>
                <input type="text" name="achievement" value="{{ $division->achievement }}">
            </div>

            <div class="form-full">
                <label>Risiko</label>
                <input type="text" name="risk" value="{{ $division->risk }}">
            </div>
        </div>

        {{-- AKSES SISTEM --}}
        <h2 style="color:#d63384; margin-bottom: 15px; margin-top: 30px;">Akses Sistem & Jam Kerja</h2>
        <div class="form-grid">
            <div>
                <label>Role Sistem</label>
                <input type="text" name="system_role" value="{{ $division->system_role }}">
            </div>

            <div>
                <label>Hak Akses</label>
                <input type="text" name="access_rights" value="{{ $division->access_rights }}">
            </div>

            <div>
                <label>Shift</label>
                <select name="shift">
                    <option value="Non-Shift" {{ $division->shift == 'Non-Shift' ? 'selected' : '' }}>Non-Shift</option>
                    <option value="Shift" {{ $division->shift == 'Shift' ? 'selected' : '' }}>Shift</option>
                </select>
            </div>

            <div>
                <label>Jam Operasional</label>
                <input type="text" name="operational_hour" value="{{ $division->operational_hour }}">
            </div>

            <div>
                <label>Lokasi</label>
                <select name="location">
                    <option value="Office" {{ $division->location == 'Office' ? 'selected' : '' }}>Office</option>
                    <option value="Hybrid" {{ $division->location == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                    <option value="Remote" {{ $division->location == 'Remote' ? 'selected' : '' }}>Remote</option>
                </select>
            </div>
        </div>

        <div style="margin-top: 25px;">
            <a href="{{ route('backend.v1.divisions.index') }}" class="btn btn-back"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
            <button type="submit" class="btn btn-save"><i class="fa-solid fa-floppy-disk"></i> Update Divisi</button>
        </div>
    </form>
</div>

</div>
</div>

@endsection