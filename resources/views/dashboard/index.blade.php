@extends('layouts.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
*{
    font-family:'Poppins',sans-serif;
    box-sizing:border-box;
}

body{
    background: #ffc7eb;
    background: linear-gradient(168deg, rgba(255, 199, 235, 1) 0%, rgba(255, 171, 226, 1) 50%, rgba(255, 255, 255, 1) 100%);
    margin:0;
}

.layout-wrapper{
    display:flex;
    min-height:100vh;
}

/* ===== PAGE LOADER ===== */
#page-loader{
    position:fixed;
    inset:0;
    background: #ff85c4;
    background: radial-gradient(circle, rgba(255, 133, 196, 1) 52%, rgba(247, 176, 233, 1) 77%, rgba(255, 255, 255, 1) 100%);;
    display:flex;
    align-items:center;
    justify-content:center;
    z-index:9999;
    transition:.5s;
}

#page-loader.hidden{
    opacity:0;
    visibility:hidden;
}

.loader-box{
    background:white;
    padding:32px 45px;
    border-radius:22px;
    box-shadow:0 20px 40px rgba(0,0,0,.2);
    text-align:center;
}

.loader-box i{
    font-size:38px;
    color:#ff4fa1;
    animation:spin 1.2s linear infinite;
}

.loader-box p{
    margin-top:12px;
    font-weight:600;
    color:#ff2d8b;
}

@keyframes spin{
    from{transform:rotate(0)}
    to{transform:rotate(360deg)}
}

/* ===== SIDEBAR ===== */
.sidebar{
    width:250px;
    background: #ff69b4;
    background: linear-gradient(169deg, rgba(255, 105, 180, 1) 52%, rgba(255, 255, 255, 1) 100%);
    padding:28px 22px;
    color:white;
    position:sticky;
    top:0;
    border-top-right-radius:40px;
    border-bottom-right-radius:40px;
    box-shadow:8px 0 25px rgba(255,77,148,.35);
}

.sidebar::after{
    content:'';
    position:absolute;
    top:0;
    right:-28px;
    width:56px;
    height:100%;
    background:rgba(255,255,255,.25);
    border-radius:50%;
    filter:blur(26px);
}

.sidebar h2{
    font-weight:800;
    margin-bottom:30px;
}

.sidebar a{
    display:flex;
    align-items:center;
    gap:10px;
    padding:12px 16px;
    margin-bottom:8px;
    border-radius:14px;
    text-decoration:none;
    color:white;
    background:rgba(255,255,255,.18);
    transition:.35s;
}

.sidebar a:hover{
    background:white;
    color:#ff2d8b;
    transform:translateX(6px);
}

/* ===== MAIN ===== */
.dashboard-container{
    flex:1;
    padding:35px 45px;
    animation:fadePage .5s ease;
}

@keyframes fadePage{
    from{opacity:0; transform:translateY(12px)}
    to{opacity:1}
}

h1{
    font-weight:800;
    color:#d63384;
    margin-bottom:25px;
}

/* ===== NAVBAR ===== */
.navbar{
    display:flex;
    justify-content:flex-end;
    gap:12px;
    margin-bottom:30px;
}

.navbar button{
    padding:8px 16px;
    border:none;
    border-radius:14px;
    background:linear-gradient(135deg,#ff4fa1,#ff85c2);
    color:white;
    font-weight:600;
    cursor:pointer;
}

/* ===== CARD ===== */
.card-container{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(320px,1fr));
    gap:22px;
    margin-bottom:25px;
}

.card{
    background:white;
    padding:20px 22px;
    border-radius:18px;
    box-shadow:0 15px 35px rgba(0,0,0,.08);
    border:1.2px solid #ffd3ec;
    transition:.3s;
}

.card:hover{ transform:translateY(-4px); }

.section-title{
    font-weight:700;
    color:#ff2d8b;
    margin-bottom:14px;
    display:flex;
    gap:8px;
}

/* ===== BADGE OTOMATIS ===== */
.card p{
    display:flex;
    align-items:center;
    gap:8px;
    margin:8px 0;
    font-size:14px;
}

.card p:has(.indicator.low){
    background:linear-gradient(135deg,#ff4d4d,#ff8a8a);
    color:white;
    padding:8px 14px;
    border-radius:999px;
    font-weight:600;
    animation:pulse 1.6s infinite;
}

.card p:has(.indicator.near){
    background:linear-gradient(135deg,#ff9800,#ffc107);
    color:white;
    padding:8px 14px;
    border-radius:999px;
    font-weight:600;
}

.card p:last-of-type{
    background:linear-gradient(135deg,#ff4fa1,#ff85c2);
    color:white;
    padding:8px 14px;
    border-radius:999px;
    font-weight:600;
}

@keyframes pulse{
    0%{box-shadow:0 0 0 0 rgba(255,77,77,.7)}
    70%{box-shadow:0 0 0 12px rgba(255,77,77,0)}
    100%{box-shadow:0 0 0 0}
}

/* ===== INDICATOR ===== */
.indicator{ width:10px; height:10px; border-radius:50%; }
.low{ background:white; }
.near{ background:white; }
.hadir{ background:#4caf50; }
.izin{ background:#ffd966; }
.sakit{ background:#2196f3; }
.alpha{ background:#ff6b6b; }

/* ===== ATTENDANCE LEGEND ===== */
.attendance-legend{
    display:flex;
    gap:12px;
    margin-bottom:12px;
    flex-wrap:wrap;
}

.attendance-legend span{
    display:flex;
    align-items:center;
    gap:6px;
    padding:6px 12px;
    border-radius:999px;
    font-size:13px;
    font-weight:600;
    color:white;
}

.legend-hadir{ background:#4caf50; }
.legend-izin{ background:#ffd966; color:#5c4b00; }
.legend-sakit{ background:#2196f3; }
.legend-alpha{ background:#ff6b6b; }

/* ===== TABLE ===== */
table{ width:100%; margin-top:10px; border-collapse:collapse; }
th{ color:#c2186b; font-size:13px; }
td{ padding:8px 0; font-size:13px; }

table td:first-child{
    background:#ffe1f1;
    padding:6px 12px;
    border-radius:999px;
    font-weight:600;
}

table td:last-child{
    text-align:right;
    font-weight:700;
    color:#ff2d8b;
}
</style>

{{-- LOADER --}}
<div id="page-loader">
    <div class="loader-box">
        <i class="fa-solid fa-spinner"></i>
        <p>Loading dashboard...</p>
    </div>
</div>

<div class="layout-wrapper">

<div class="sidebar">
    <h2>Menu</h2>
    <a href="{{ route('backend.v1.dashboard') }}"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
    <a href="{{ route('backend.v1.products.index') }}"><i class="fa-solid fa-box"></i> Produk</a>
    <a href="{{ route('backend.v1.divisions.index') }}"><i class="fa-solid fa-building"></i> Divisi</a>
    <a href="{{ route('backend.v1.employees.index') }}"><i class="fa-solid fa-user-tie"></i> Karyawan</a>
    <a href="{{ route('backend.v1.attendances.index') }}"><i class="fa-solid fa-clock"></i> Absensi</a>
</div>

<div class="dashboard-container">

<div class="navbar">
    <a href="{{ route('backend.v1.orders.index') }}" class="inline-flex items-center">
        <button><i class="fa-solid fa-box"></i> Orders</button>
    </a>

    <a href="{{ route('backend.v1.statistik.index') }}" style="text-decoration: none;">
        <button type="button"><i class="fa-solid fa-chart-pie"></i> Statistik</button>
    </a>

    <a href="{{ route('backend.v1.profile.edit') }}" class="inline-flex items-center">
        <button><i class="fa-solid fa-user"></i> Profile</button>
    </a>
    
    {{-- <a href="{{ route('backend.v1.settings.index') }}" style="text-decoration: none;">
        <button type="button"><i class="fa-solid fa-gear"></i> Settings</button>
    </a> --}}
    
    <form id="form-logout" action="{{ route('logout') }}" method="post">
        @csrf
        <button type="button" id="btn-logout-dashboard">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </button>
    </form>
</div>

<h1>Dashboard Monitoring</h1>

<div class="card-container">

{{-- Selamat Datang Ceria dengan Icon Bunga --}}
<div class="welcome-card" style="background: #ffe3f2;
background: radial-gradient(circle, rgba(255, 227, 242, 1) 0%, rgba(255, 255, 255, 1) 100%);; 
    padding:25px 30px; border-radius:22px; margin-bottom:25px; 
    box-shadow:0 12px 30px rgba(255,77,148,0.2); text-align:center; animation:fadeIn 1s ease;">
    
    <h2 style="margin:0; color:#d63384; font-weight:800; font-size:22px;">
        <i class="fa-solid fa-flower"></i> Selamat Datang, {{ auth()->user()->name }}! <i class="fa-solid fa-flower"></i>
    </h2>
    <p style="margin-top:10px; color:#ff4fa1; font-weight:600; font-size:16px;">
        Semoga harimu menyenangkan dan penuh energi untuk mengelola dashboard Kanola Skincare! 
        <i class="fa-solid fa-flower"></i>
    </p>
</div>

<style>
@keyframes fadeIn {
    from {opacity: 0; transform: translateY(-15px);}
    to {opacity: 1; transform: translateY(0);}
}
</style>

<div class="card">
    <p class="section-title"><i class="fa-solid fa-box"></i> Data Produk</p>
    <p><span class="indicator low"></span>Stok Menipis : <b>{{ $low_stock }}</b></p>
    <p><span class="indicator near"></span>Akan Expired : <b>{{ $near_expired }}</b></p>
    <p>Total Aktif : <b>{{ $total_products }}</b></p>
</div>

<div class="card">
    <p class="section-title"><i class="fa-solid fa-users"></i> Data Karyawan</p>
    <p>Total Karyawan : <b>{{ $total_employees }}</b></p>
    <table>
        <tr><th>Divisi</th><th>Jumlah</th></tr>
        @foreach($employees_by_division->slice(0, 3) as $div)
        <tr>
            <td>{{ $div->name }}</td>
            <td>{{ $div->employees_count }}</td>
        </tr>
        @endforeach
    </table>

    <!-- Button menuju halaman Karyawan -->
    <div style="margin-top:15px; text-align:right;">
        <a href="{{ route('backend.v1.employees.index') }}" 
           style="padding:8px 16px; border-radius:14px; background:linear-gradient(135deg,#ff4fa1,#ff85c2); color:white; font-weight:600; text-decoration:none; transition:0.3s;">
            Lihat Semua Karyawan
        </a>
    </div>
</div>

<style>
@keyframes fadeIn {
    from {opacity: 0; transform: translateY(-15px);}
    to {opacity: 1; transform: translateY(0);}
}
</style>

</div>

<div class="card-container">

<div class="card">
    <p class="section-title"><i class="fa-solid fa-chart-column"></i> Karyawan per Divisi</p>
    <canvas id="divisionChart" height="120"></canvas>
</div>

<div class="card">
    <p class="section-title">
        <i class="fa-solid fa-calendar-check"></i> Kehadiran Hari Ini
    </p>

    <div class="attendance-legend">
        <span class="legend-hadir">
            <i class="fa-solid fa-circle-check"></i>
            <span class="indicator hadir"></span> Hadir
        </span>

        <span class="legend-izin">
            <i class="fa-solid fa-envelope-open-text"></i>
            <span class="indicator izin"></span> Izin
        </span>

        <span class="legend-sakit">
            <i class="fa-solid fa-stethoscope"></i>
            <span class="indicator sakit"></span> Sakit
        </span>

        <span class="legend-alpha">
            <i class="fa-solid fa-circle-xmark"></i>
            <span class="indicator alpha"></span> Alpha
        </span>
    </div>

    <canvas id="attendanceChart" height="120"></canvas>
</div>

<div class="card scroll-reveal">
    <p class="section-title" style="font-weight:bold;">
        <i class="fa-solid fa-map-location-dot" style="color:#f65b88"></i> Lokasi PT. Kanola Beauty & Care
    </p>
    <div id="map" style="width:100%; height:250px; border-radius:18px; margin-top: 10px;"></div>
</div>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    // Map compact, view di Jakarta
    var map = L.map('map').setView([-6.2088, 106.8456], 16);

    // Tile pink-themed
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Marker Jakarta
    var kanolaMarker = L.marker([-6.2088, 106.8456], {
        riseOnHover: true
    })
    .addTo(map)
    .bindPopup(
        `<div style="font-weight:700; color:#d63384;">PT. Kanola Beauty & Care</div>
        <div style="font-size:13px; margin-top:4px;">
            Jl. Jenderal Sudirman No.12, Jakarta Pusat<br>
            Telp: (021) 123-4567<br>
            Email: info@kanola.co.id
        </div>`, 
        { offset: [0, -25] } // Offset agar popup tidak menutupi ujung marker
    )
    .bindTooltip("PT. Kanola Beauty & Care", {
        permanent: false, 
        direction: "top", 
        className: 'custom-tooltip'
    })
    .openPopup();
</script>

<style>
/* Warna pink untuk map tiles */
#map img {
    filter: hue-rotate(300deg) saturate(1.2) brightness(1.1);
}

/* Marker bounce sederhana */
@keyframes bounce {
    0%   { transform: translateY(0); }
    25%  { transform: translateY(-6px); }
    50%  { transform: translateY(0); }
    75%  { transform: translateY(-3px); }
    100% { transform: translateY(0); }
}
.leaflet-marker-icon {
    animation: bounce 1.5s infinite;
}

/* Tooltip cantik */
.custom-tooltip {
    background-color: #ff85c2 !important;
    color: white !important;
    font-weight: 600;
    padding: 5px 10px;
    border-radius: 10px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.2);
    font-size: 12px;
}
</style>

</div>

</div>
</div>

<script>
// pop up logout confirmation
document.getElementById('btn-logout-dashboard').addEventListener('click', function() {
        Swal.fire({
            title: 'Yakin ingin keluar?',
            text: "Anda akan mengakhiri sesi dashboard ini.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#ff4fa1 ',
            confirmButtonText: 'Ya, Logout',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form logout
                document.getElementById('form-logout').submit();
            }
        });
    });

// hide loader
window.addEventListener('load',()=>{
    document.getElementById('page-loader').classList.add('hidden');
});

// page transition
document.querySelectorAll('.sidebar a').forEach(a=>{
    a.addEventListener('click',e=>{
        e.preventDefault();
        document.getElementById('page-loader').classList.remove('hidden');
        setTimeout(()=>window.location.href=a.href,450);
    });
});

// gradient chart
const ctx=document.getElementById('divisionChart').getContext('2d');
const grad=ctx.createLinearGradient(0,0,0,200);
grad.addColorStop(0,'#ff4fa1');
grad.addColorStop(1,'#ffd1e8');

new Chart(ctx,{
    type:'bar',
    data:{
        labels:[@foreach($employees_by_division as $d) "{{ $d->name }}", @endforeach],
        datasets:[{ data:[@foreach($employees_by_division as $d) {{ $d->employees_count }}, @endforeach], backgroundColor:grad, borderRadius:14 }]
    },
    options:{plugins:{legend:{display:false}},scales:{y:{beginAtZero:true}}}
});

new Chart(document.getElementById('attendanceChart'),{
    type:'bar',
    data:{
        labels:['Hadir','Izin','Sakit','Alpha'],
        datasets:[{
            data:[{{ $present_today }},{{ $izin_today }},{{ $sakit_today }},{{ $alpha_today }}],
            backgroundColor:['#4caf50','#ffd966','#2196f3','#ff6b6b'],
            borderRadius:14
        }]
    },
    options:{plugins:{legend:{display:false}},scales:{y:{beginAtZero:true}}}
});

// stok kritis alert
@if($low_stock > 0)
Swal.fire({
    icon:'warning',
    title:'⚠️ Stok Kritis',
    text:'Ada {{ $low_stock }} produk stok menipis',
    confirmButtonColor:'#ff4d94'
});
@endif
</script>

@endsection