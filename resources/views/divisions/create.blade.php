@extends('layouts.layouts')

@section('content')

{{-- GOOGLE FONT --}}
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

{{-- FONT AWESOME --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
*{ font-family:'Poppins',sans-serif; box-sizing:border-box; margin:0; padding:0; }

body{     background: #ffc7eb;
    background: linear-gradient(168deg, rgba(255, 199, 235, 1) 0%, rgba(255, 171, 226, 1) 50%, rgba(255, 255, 255, 1) 100%);
; }

.app-wrapper{ display:flex; min-height:100vh; }

/* ===== SIDEBAR ===== */
.sidebar{
    width:260px;
    background: #ff69b4;
    background: linear-gradient(169deg, rgba(255, 105, 180, 1) 52%, rgba(255, 255, 255, 1) 100%)    padding:30px 22px;
    color:white;
    position:fixed;
    top:0;
    left:0;
    bottom:0;
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
.sidebar h3{
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
.sidebar a i{
    width:22px;
    font-size:16px;
}
.sidebar a:hover, .sidebar a.active{
    background:rgba(255,255,255,.25);
    transform:translateX(6px);
}

/* ===== CONTENT ===== */
.dashboard-container{
    margin-left:260px;
    padding:40px 50px;
    width:100%;
}
h1{ font-weight:800; color:#d63384; margin-bottom:25px; }
.card{
    background:white;
    padding:24px;
    border-radius:20px;
    box-shadow:0 12px 30px rgba(0,0,0,.08);
    border:1px solid #ffd3ec;
    margin-bottom:26px;
}
h2{ color:#d63384; font-weight:700; margin-bottom:18px; }

/* ===== FORM ===== */
label{
    font-weight:600;
    color:#c2186b;
    margin-bottom:6px;
    display:block;
}
input, textarea, select{
    width:100%;
    padding:11px 14px;
    border-radius:14px;
    border:1px solid #ffc1dd;
    outline:none;
    transition:.3s;
}
input:focus, textarea:focus, select:focus{
    border-color:#ff4fa1;
}

/* ===== GRID FORM ===== */
.form-grid{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:18px 24px;
    margin-bottom:18px;
}
.form-full{ grid-column:span 2; }

/* ===== BUTTON ===== */
.btn-save{
    background:linear-gradient(135deg,#ff4fa1,#ff85c2);
    color:white;
    padding:14px 30px;
    border:none;
    border-radius:18px;
    font-weight:700;
    cursor:pointer;
    box-shadow:0 10px 25px rgba(255,79,161,.35);
    transition: all .3s ease;
}
.btn-save:hover{ opacity:.9; }

/* RESPONSIVE */
@media(max-width:768px){
    .sidebar{ display:none; }
    .dashboard-container{ margin-left:0; padding:25px 18px; }
    .form-grid{ grid-template-columns:1fr; }
    .form-full{ grid-column:span 1; }
}
</style>

<div class="app-wrapper">

    {{-- SIDEBAR --}}
    <div class="sidebar">
        <h3>Menu 💗</h3>
        <a href="{{ route('backend.v1.dashboard') }}"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
        <a href="{{ route('backend.v1.divisions.index') }}" class="active"><i class="fa-solid fa-building"></i> Divisi</a>
        <a href="{{ route('backend.v1.employees.index') }}"><i class="fa-solid fa-user-tie"></i> Karyawan</a>
    </div>

    {{-- CONTENT --}}
    <div class="dashboard-container">

        <h1>Tambah Divisi 💗</h1>

        <form method="POST" action="{{ route('backend.v1.divisions.store') }}">
        @csrf

        {{-- STRUKTUR & FUNGSI --}}
        <div class="card">
            <h2>Struktur & Fungsi Divisi</h2>
            <div class="form-grid">
                <div>
                    <label>Kode Divisi</label>
                    <input type="text" name="code" placeholder="DIV-IT-01" required>
                </div>

                <div>
                    <label>Nama Divisi</label>
                    <input type="text" name="name" placeholder="IT Development" required>
                </div>

                <div>
                    <label>Parent Divisi</label>
                    <input type="text" name="parent" placeholder="Direktorat Teknologi">
                </div>

                <div>
                    <label>Level</label>
                    <select name="level">
                        <option>Direktorat</option>
                        <option>Departemen</option>
                        <option>Sub Divisi</option>
                    </select>
                </div>

                <div class="form-full">
                    <label>Fungsi Utama</label>
                    <textarea name="main_function" placeholder="Pengembangan dan pemeliharaan sistem"></textarea>
                </div>

                <div class="form-full">
                    <label>Ruang Lingkup</label>
                    <textarea name="scope" placeholder="Aplikasi internal, website, server"></textarea>
                </div>

                <div>
                    <label>Status</label>
                    <select name="status">
                        <option>Aktif</option>
                        <option>Nonaktif</option>
                    </select>
                </div>
            </div>
        </div>

        {{-- OPERASIONAL & KPI --}}
        <div class="card">
            <h2>Operasional & KPI Divisi</h2>
            <div class="form-grid">
                <div>
                    <label>Manager</label>
                    <input type="text" name="manager">
                </div>

                <div>
                    <label>Jumlah Staff</label>
                    <input type="number" name="staff">
                </div>

                <div>
                    <label>Anggaran</label>
                    <input type="number" name="budget" placeholder="Rp">
                </div>

                <div>
                    <label>Target KPI</label>
                    <input type="text" name="target_kpi">
                </div>

                <div>
                    <label>Capaian</label>
                    <input type="text" name="achievement">
                </div>

                <div class="form-full">
                    <label>Risiko</label>
                    <input type="text" name="risk">
                </div>
            </div>
        </div>

        {{-- AKSES SISTEM --}}
        <div class="card">
            <h2>Akses Sistem & Jam Kerja</h2>
            <div class="form-grid">
                <div>
                    <label>Role Sistem</label>
                    <input type="text" name="system_role">
                </div>

                <div>
                    <label>Hak Akses</label>
                    <input type="text" name="access_rights">
                </div>

                <div>
                    <label>Shift</label>
                    <select name="shift">
                        <option>Non-Shift</option>
                        <option>Shift</option>
                    </select>
                </div>

                <div>
                    <label>Jam Operasional</label>
                    <input type="text" name="operational_hour">
                </div>

                <div>
                    <label>Lokasi</label>
                    <select name="location">
                        <option>Office</option>
                        <option>Hybrid</option>
                        <option>Remote</option>
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn-save">💾 Simpan Divisi</button>

        </form>

    </div>
</div>

@endsection