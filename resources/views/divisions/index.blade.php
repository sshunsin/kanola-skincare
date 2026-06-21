@extends('layouts.app')

@section('content')

<!-- GOOGLE FONT -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;800&display=swap" rel="stylesheet">

<!-- FONT AWESOME ICON -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

<style>
* { font-family:'Poppins',sans-serif; margin:0; padding:0; box-sizing:border-box; }

body {     background: #ffc7eb; background: linear-gradient(168deg, rgba(255, 199, 235, 1) 0%, rgba(255, 171, 226, 1) 50%, rgba(255, 255, 255, 1) 100%);; }

.layout-wrapper { display:flex; min-height:100vh; }

/* ===== LOADER ===== */
#pageLoader{
    position:fixed;
    inset:0;
    background: #ffc7eb;
    background: linear-gradient(168deg, rgba(255, 199, 235, 1) 0%, rgba(255, 171, 226, 1) 50%, rgba(255, 255, 255, 1) 100%);
    display:flex;
    align-items:center;
    justify-content:center;
    z-index:9999;
    opacity:0;
    pointer-events:none;
    transition:.35s;
}
#pageLoader.show{ opacity:1; pointer-events:all; }

.loader-content{
    text-align:center;
    color:#ff2d8b;
    font-weight:700;
}
.heart{
    width:50px;height:50px;
    background:#ff4d94;
    transform:rotate(-45deg);
    animation:pulse 1s infinite;
    position:relative;
    margin:0 auto 12px;
}
.heart:before,.heart:after{
    content:"";
    width:50px;height:50px;
    background:#ff4d94;
    border-radius:50%;
    position:absolute;
}
.heart:before{ top:-25px; }
.heart:after{ left:25px; }

@keyframes pulse{
    0%{ transform:rotate(-45deg) scale(1); }
    50%{ transform:rotate(-45deg) scale(1.15); }
    100%{ transform:rotate(-45deg) scale(1); }
}

/* ===== SIDEBAR ===== */
.sidebar{
    width:250px;
    background: #ff69b4;
    background: linear-gradient(169deg, rgba(255, 105, 180, 1) 52%, rgba(255, 255, 255, 1) 100%);
    color:white;
    padding:30px 22px;
    position:sticky;
    top:0;
    border-top-right-radius:40px;
    border-bottom-right-radius:40px;
    box-shadow:8px 0 25px rgba(255,77,148,.35);
    overflow-y:auto;
}

/* Glowing blur effect di sisi kanan */
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

/* ===== MENU ITEM ===== */
.sidebar a{
    display:flex;
    align-items:center;
    gap:12px;
    color:white;
    text-decoration:none;
    padding:12px 16px;
    border-radius:14px;
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
    width:20px;
    font-size:15px;
}

/* ===== MAIN CONTENT ===== */
.dashboard-container{
    flex:1;
    padding:40px 45px;
    overflow-y:auto;
    transition:all .35s;
}

.page-transition{
    opacity:0;
    transform:translateX(15px);
    transition:.35s;
}
.page-transition.show{
    opacity:1;
    transform:translateX(0);
}

h1{ font-weight:800; color:#d63384; margin-bottom:25px; }

.section-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:15px;
}
.section-header h2{ color:#d63384;font-weight:700; }

.btn-add{
    background:linear-gradient(135deg,#ff4fa1,#ff85c2);
    color:white;
    padding:7px 14px;
    border-radius:12px;
    text-decoration:none;
    font-size:13px;
    font-weight:600;
    box-shadow:0 6px 18px rgba(255,79,161,.35);
    transition: all .3s;
}
.btn-add:hover{
    transform:translateY(-2px);
}

/* ===== CARD ===== */
.card{
    background:white;
    padding:20px;
    border-radius:18px;
    box-shadow:0 15px 35px rgba(0,0,0,.08);
    border:1px solid #ffd3ec;
    margin-bottom:30px;
    transition:all .3s ease;
}

/* ===== SUB MENU ===== */
.submenu{
    margin:10px 0 20px 35px;
    display:flex;
    flex-direction:column;
    gap:10px;
}

.submenu a{
    background:rgba(255,255,255,.18);
    padding:10px 14px;
    border-radius:14px;
    font-size:13px;
    font-weight:500;
    display:flex;
    align-items:center;
    gap:10px;
    transition:all .35s ease;
    box-shadow:0 6px 18px rgba(255,77,148,.25);
}

.submenu a i{
    font-size:13px;
}

.submenu a:hover{
    background:rgba(255,255,255,.35);
    transform:translateX(6px);
}

.submenu a.active{
    background:linear-gradient(135deg,#ff5fa2,#ff8cc6);
    box-shadow:0 10px 28px rgba(255,77,148,.55);
    font-weight:600;
}

/* ===== TABLE ===== */
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

<!-- ===== LOADER ===== -->
<div id="pageLoader">
    <div class="loader-content">
        <div class="heart"></div>
        <p>Loading halaman...</p>
    </div>
</div>

<div class="layout-wrapper">

{{-- SIDEBAR --}}
<div class="sidebar">
    <h2>Menu</h2>
    <a href="{{ route('backend.v1.dashboard') }}"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
    <a href="{{ route('backend.v1.products.index') }}"><i class="fa-solid fa-box"></i> Produk</a>
    <a href="{{ route('backend.v1.divisions.index') }}"><i class="fa-solid fa-building"></i> Divisi</a>
{{-- <div class="submenu">
    <a href="{{ route('v1.backend.analytics.employee-counts.index') }}"
       class="{{ request()->routeIs('v1.backend.analytics.employee-counts.*') ? 'active' : '' }}">
        <i class="fa-solid fa-users"></i> Jumlah Karyawan
    </a>

    <a href="{{ route('v1.backend.analytics.targets.index') }}"
       class="{{ request()->routeIs('v1.backend.analytics.targets.*') ? 'active' : '' }}">
        <i class="fa-solid fa-bullseye"></i> Target Divisi
    </a>

    <a href="{{ route('v1.backend.analytics.performances.index') }}"
       class="{{ request()->routeIs('v1.backend.analytics.performances.*') ? 'active' : '' }}">
        <i class="fa-solid fa-chart-column"></i> Kinerja Divisi
    </a>

    <a href="{{ route('v1.backend.analytics.evaluations.index') }}"
       class="{{ request()->routeIs('v1.backend.analytics.evaluations.*') ? 'active' : '' }}">
        <i class="fa-solid fa-star"></i> Evaluasi Divisi
    </a>
</div> --}}
    <a href="{{ route('backend.v1.employees.index') }}"><i class="fa-solid fa-user-tie"></i> Karyawan</a>
    <a href="{{ route('backend.v1.attendances.index') }}"><i class="fa-solid fa-clock"></i> Absensi</a>
</div>

{{-- CONTENT --}}
<div class="dashboard-container page-transition" id="pageContent">

<h1>Manajemen Divisi</h1>

{{-- STRUKTUR & FUNGSI --}}
<div class="card">
    <div class="section-header">
        <h2>Struktur & Fungsi Divisi</h2>
        <a href="{{ route('backend.v1.divisions.create') }}" class="btn-add">+ Tambah Divisi</a>
    </div>

    <table>
        <tr>
            <th>Kode</th><th>Divisi</th><th>Department</th><th>Level</th>
            <th>Fungsi</th><th>Ruang Lingkup</th><th>Status</th><th>Aksi</th>
        </tr>
        @foreach($divisions as $d)
        <tr>
            <td>{{ $d->code }}</td>
            <td>{{ $d->name }}</td>
            <td>{{ $d->parent ?? '-' }}</td>
            <td>{{ $d->level }}</td>
            <td>{{ $d->main_function }}</td>
            <td>{{ $d->scope }}</td>
            <td>{{ $d->status }}</td>
            <td>
                <a href="{{ route('backend.v1.divisions.edit', $d->id) }}" class="btn-action">
                    <i class="fa-solid fa-pen-to-square"></i> Edit
                </a>

                <form action="{{ route('backend.v1.divisions.destroy', $d->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-action"
                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                        <i class="fa-solid fa-trash"></i> Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

{{-- OPERASIONAL & KPI --}}
<div class="card">
    <div class="section-header">
        <h2>Operasional & KPI</h2>
        <a href="{{ route('backend.v1.divisions.create') }}" class="btn-add">+ Tambah Divisi</a>
    </div>

    <table>
        <tr>
            <th>Kode</th><th>Divisi</th><th>Manager</th><th>Staff</th>
            <th>Anggaran</th><th>Target KPI</th><th>Capaian</th><th>Risiko</th><th>Aksi</th>
        </tr>
        @foreach($divisions as $d)
        <tr>
            <td>{{ $d->code }}</td>
            <td>{{ $d->name }}</td>
            <td>{{ $d->manager }}</td>
            <td>{{ $d->staff }}</td>
            <td>Rp {{ number_format($d->budget,0,',','.') }}</td>
            <td>{{ $d->target_kpi }}</td>
            <td>{{ $d->achievement }}</td>
            <td>{{ $d->risk }}</td>
            <td>
                <a href="{{ route('backend.v1.divisions.edit', $d->id) }}" class="btn-action">
                    <i class="fa-solid fa-pen-to-square"></i> Edit
                </a>

                <form action="{{ route('backend.v1.divisions.destroy', $d->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-action"
                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                        <i class="fa-solid fa-trash"></i> Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

{{-- AKSES SISTEM --}}
<div class="card">
    <div class="section-header">
        <h2>Akses Sistem & Jam Kerja</h2>
        <a href="{{ route('backend.v1.divisions.create') }}" class="btn-add">+ Tambah Divisi</a>
    </div>

    <table>
        <tr>
            <th>Kode</th><th>Divisi</th><th>Role</th>
            <th>Hak Akses</th><th>Shift</th><th>Jam</th><th>Lokasi</th><th>Aksi</th>
        </tr>
        @foreach($divisions as $d)
        <tr>
            <td>{{ $d->code }}</td>
            <td>{{ $d->name }}</td>
            <td>{{ $d->system_role }}</td>
            <td>{{ $d->access_rights }}</td>
            <td>{{ $d->shift }}</td>
            <td>{{ $d->operational_hour }}</td>
            <td>{{ $d->location }}</td>
            <td>
                <a href="{{ route('backend.v1.divisions.edit', $d->id) }}" class="btn-action">
                    <i class="fa-solid fa-pen-to-square"></i> Edit
                </a>

                <form action="{{ route('backend.v1.divisions.destroy', $d->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-action"
                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                        <i class="fa-solid fa-trash"></i> Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

</div>
</div>

{{-- PAGE TRANSITION SCRIPT --}}
<script>
document.addEventListener("DOMContentLoaded",()=>{
    const page=document.getElementById("pageContent");
    const loader=document.getElementById("pageLoader");
    page.classList.add("show");

    document.querySelectorAll(".sidebar a").forEach(link=>{
        link.addEventListener("click",e=>{
            e.preventDefault();
            page.classList.remove("show");
            loader.classList.add("show");
            setTimeout(()=>window.location.href=link.href,400);
        });
    });
});
</script>

@endsection