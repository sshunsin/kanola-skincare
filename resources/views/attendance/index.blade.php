@extends('layouts.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
* {
    font-family: 'Poppins', sans-serif;
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

.app-wrapper {
    display: flex;
    min-height: 100vh;
    background: linear-gradient(168deg, rgba(255,199,235,1) 0%, rgba(255,171,226,1) 50%, rgba(255,255,255,1) 100%);
}

.sidebar {
    width: 250px;
    background: linear-gradient(169deg, rgba(255,105,180,1) 52%, rgba(255,255,255,1) 100%);
    padding: 30px 22px;
    color: white;
    border-top-right-radius: 40px;
    border-bottom-right-radius: 40px;
    box-shadow: 8px 0 25px rgba(255,77,148,.35);
    position: fixed;
    height: 100%;
    overflow-y: auto;
}

.sidebar h2 {
    font-weight: 800;
    margin-bottom: 35px;
    letter-spacing: 1px;
    color: white;
}

.menu-item {
    display: flex;
    align-items: center;
    gap: 12px;
    color: white;
    text-decoration: none;
    padding: 12px 18px;
    border-radius: 16px;
    margin-bottom: 10px;
    font-weight: 500;
    transition: all .35s ease;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.menu-item:hover,
.menu-item.active {
    background: rgba(255,255,255,.25);
    transform: translateX(6px);
}

.main-content {
    flex: 1;
    margin-left: 250px;
    padding: 35px 45px;
    overflow-y: auto;
}

.main-title {
    font-size: 26px;
    font-weight: 800;
    color: #d63384;
    margin-bottom: 25px;
}

.btn {
    padding: 9px 18px;
    border-radius: 14px;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.btn-back {
    background: #ffe1f1;
    color: #c2186b;
}

.btn-add {
    background: linear-gradient(135deg,#ff4fa1,#ff85c2);
    color: white;
}

.filter-box {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 20px;
}

.filter-box input,
.filter-box select {
    padding: 10px 14px;
    border-radius: 12px;
    border: 1px solid #ffc1dd;
    font-size: 14px;
    outline: none;
}

.filter-btn {
    background: #ff4fa1;
    color: white;
    border: none;
    padding: 10px 16px;
    border-radius: 12px;
    cursor: pointer;
    font-weight: 600;
}

.reset-btn {
    background: #ffe6f3;
    color: #c2186b;
    border: none;
    padding: 10px 16px;
    border-radius: 12px;
    cursor: pointer;
    font-weight: 600;
    text-decoration: none;
}

.card {
    background: white;
    padding: 25px;
    border-radius: 22px;
    box-shadow: 0 15px 35px rgba(0,0,0,.08);
    margin-top: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th {
    background: #ffe0f0;
    padding: 14px;
    text-align: left;
    font-weight: 700;
    color: #c2186b;
}

td {
    padding: 12px 14px;
    border-bottom: 1px solid #ffe6f3;
    vertical-align: middle;
}

tr:last-child td {
    border-bottom: none;
}

tr:nth-child(even) {
    background: #fff7fc;
}

.btn-action {
    font-size: 12px;
    font-weight: 600;
    color: #d63384;
    text-decoration: none;
    margin-right: 6px;
    display: inline-flex;
    align-items: center;
    gap: 4px;
}

.badge {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 12px;
    color: white;
    font-weight: 600;
    font-size: 12px;
    text-align: center;
}

.badge-hadir { background: linear-gradient(135deg,#4caf50,#66bb6a); }
.badge-izin { background: linear-gradient(135deg,#ffc107,#ffca28); }
.badge-sakit { background: linear-gradient(135deg,#2196f3,#64b5f6); }
.badge-alpha { background: linear-gradient(135deg,#f44336,#ff6b6b); }

/* ===== GAYA BARU KALENDER INTERAKTIF ===== */
.calendar-card {
    background: white;
    padding: 25px;
    border-radius: 22px;
    box-shadow: 0 15px 35px rgba(0,0,0,.08);
    margin-top: 25px;
}

.calendar-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
    margin-bottom: 20px;
}

.calendar-controls {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.calendar-controls select {
    padding: 8px 14px;
    min-width: 120px;
    border-radius: 10px;
    border: 1px solid #ffc1dd;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    outline: none;
    cursor: pointer;
    background-color: white;
}

.calendar-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 8px;
    text-align: center;
}

.calendar-day-label {
    font-weight: 700;
    color: #c2186b;
    padding: 10px 0;
    background: #ffe0f0;
    border-radius: 10px;
}

.calendar-cell {
    min-height: 85px;
    padding: 8px;
    border: 1px solid #ffe6f3;
    border-radius: 12px;
    background: #fff7fc;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.calendar-cell:hover {
    background: #ffe6f3;
    transform: translateY(-2px);
}

.calendar-cell.empty {
    background: transparent;
    border: none;
    cursor: default;
}

.calendar-cell.empty:hover {
    transform: none;
}

.calendar-date-number {
    font-weight: 700;
    color: #444;
    font-size: 14px;
}

.calendar-cell-badge {
    font-size: 10px;
    padding: 2px 6px;
    border-radius: 8px;
    color: white;
    font-weight: 600;
    margin-top: 4px;
    width: 100%;
    text-align: center;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

@media(max-width:900px) {
    .main-content { margin-left: 0; padding: 20px; }
    .sidebar { width: 100%; border-radius: 0; display: flex; flex-wrap: wrap; position: relative; height: auto; }
}
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

        <h2 class="main-title"><i class="fa-solid fa-clock"></i> Data Kehadiran Karyawan 💗</h2>

        {{-- BUTTON --}}
        <div style="display:flex; gap:12px; margin-bottom:15px;">
            <a class="btn btn-back" href="{{ route('backend.v1.dashboard') }}"><i class="fa-solid fa-arrow-left"></i></a>
            <a class="btn btn-add" href="{{ route('backend.v1.attendances.create') }}"><i class="fa-solid fa-plus"></i> Tambah Kehadiran</a>
        </div>

        {{-- SEARCH & FILTER --}}
        <form method="GET" action="{{ route('backend.v1.attendances.index') }}">
            <div class="filter-box">
                <input type="text" name="search" placeholder="Cari nama karyawan..." value="{{ request('search') }}">
                <input type="date" name="date" value="{{ request('date') }}">
                <button class="filter-btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i> Filter</button>
                <a class="reset-btn" href="{{ route('backend.v1.attendances.index') }}">Reset</a>
            </div>
        </form>

        {{-- TABEL KEHADIRAN --}}
        <div class="card">
            <table>
                <tr>
                    <th><i class="fa-solid fa-user"></i> Employee</th>
                    <th><i class="fa-solid fa-calendar-days"></i> Date</th>
                    <th><i class="fa-solid fa-arrow-right-to-bracket"></i> Check In</th>
                    <th><i class="fa-solid fa-arrow-left-from-bracket"></i> Check Out</th>
                    <th><i class="fa-solid fa-circle"></i> Status</th>
                    <th><i class="fa-solid fa-note-sticky"></i> Notes</th>
                    <th><i class="fa-solid fa-gear"></i> Action</th>
                </tr>
                @foreach($attendances as $a)
                <tr>
                    <td>{{ $a->name ?? '-' }}</td>
                    <td>{{ $a->date }}</td>
                    <td>{{ $a->check_in ?? '-' }}</td>
                    <td>{{ $a->check_out ?? '-' }}</td>
                    <td>
                        <span class="badge badge-{{ strtolower($a->status ?? 'alpha') }}">
                            {{ $a->status ?? '-' }}
                        </span>
                    </td>
                    <td>{{ $a->notes ?? '-' }}</td>
                    <td>
                        <a class="btn-action" href="{{ route('backend.v1.attendances.edit',$a->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <form action="{{ route('backend.v1.attendances.destroy') }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="id" value="{{ $a->id }}">
                            <button type="submit" onclick="return confirm('Yakin hapus data?')">
                                <i class="fa-solid fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

        {{-- GRAFIK KEHADIRAN --}}
        {{-- <div class="card">
            <canvas id="attendanceChart" height="100"></canvas>
        </div> --}}

        {{-- KALENDER INTERAKTIF 12 BULAN & PILIH TAHUN --}}
        <div class="calendar-card">
            <div class="calendar-header">
                <h3 style="color:#d63384;"><i class="fa-solid fa-calendar-days"></i> Kalender Presensi Kehadiran</h3>
                <div class="calendar-controls">
                    <select id="selectMonth" onchange="changeCalendar()"></select>
                    <select id="selectYear" onchange="changeCalendar()"></select>
                </div>
            </div>
            <div class="calendar-grid" id="calendarGrid"></div>
        </div>

    </div>
</div>

<script>
    const ctx = document.getElementById('attendanceChart').getContext('2d');
    const statusLabels = ['Hadir', 'Izin', 'Sakit', 'Alpha'];
    const statusColors = ['#4caf50','#ffc107','#2196f3','#f44336'];

    const statusCounts = [
        {{ $attendances->where('status','Hadir')->count() }},
        {{ $attendances->where('status','Izin')->count() }},
        {{ $attendances->where('status','Sakit')->count() }},
        {{ $attendances->where('status','Alpha')->count() }}
    ];

    const attendanceChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: statusLabels,
            datasets: [{
                label: 'Jumlah Kehadiran',
                data: statusCounts,
                backgroundColor: statusColors,
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            animation: {
                duration: 1500,
                easing: 'easeOutBounce'
            },
            plugins: {
                legend: { display: false },
                title: {
                    display: true,
                    text: 'Statistik Status Kehadiran Keseluruhan',
                    color: '#d63384',
                    font: { size: 16, weight: 'bold' }
                }
            },
            scales: {
                y: { beginAtZero: true, ticks: { precision: 0 } },
                x: { ticks: { color: '#d63384', font: { weight: 'bold' } } }
            }
        }
    });
</script>

<script>
// Parsing data kehadiran dari Laravel collection ke javascript object format
const attendancesData = @json($attendances);

// Mengelompokkan data berdasarkan tanggal string 'YYYY-MM-DD' atau 'YYYY-M-D'
const attendancesPerDay = {};
attendancesData.forEach(item => {
    // Normalisasi format tanggal database agar menghilangkan zero padding jika ada perbedaan
    const d = new Date(item.date);
    const dateStr = `${d.getFullYear()}-${d.getMonth() + 1}-${d.getDate()}`;
    if (!attendancesPerDay[dateStr]) {
        attendancesPerDay[dateStr] = [];
    }
    attendancesPerDay[dateStr].push({
        name: item.name,
        status: item.status,
        check_in: item.check_in,
        check_out: item.check_out,
        notes: item.notes
    });
});

const monthNames = [
    "Januari", "Februari", "Maret", "April", "Mei", "Juni",
    "Juli", "Agustus", "September", "Oktober", "November", "Desember"
];

const today = new Date();
let currentMonth = today.getMonth();
let currentYear = today.getFullYear();

// Inisialisasi Dropdown Bulan & Tahun
const selectMonth = document.getElementById('selectMonth');
const selectYear = document.getElementById('selectYear');

selectMonth.innerHTML = '';
selectYear.innerHTML = '';

monthNames.forEach((name, index) => {
    let option = document.createElement('option');
    option.value = index;
    option.text = name;
    if(index === currentMonth) option.selected = true;
    selectMonth.appendChild(option);
});

// Mengisi pilihan tahun dari 5 tahun lalu sampai 5 tahun ke depan dengan aman
for(let y = currentYear - 5; y <= currentYear + 5; y++) {
    let option = document.createElement('option');
    option.value = y;
    option.text = y;
    if(y === currentYear) option.selected = true;
    selectYear.appendChild(option);
}

// Fungsi render utama kalender grid
function renderCalendar(month, year) {
    const calendarGrid = document.getElementById('calendarGrid');
    calendarGrid.innerHTML = '';

    const dayLabels = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    dayLabels.forEach(label => {
        let div = document.createElement('div');
        div.className = 'calendar-day-label';
        div.innerText = label;
        calendarGrid.appendChild(div);
    });

    const firstDayIndex = new Date(year, month, 1).getDay();
    const totalDays = new Date(year, month + 1, 0).getDate();

    // Membuat sel kosong untuk menyelaraskan hari awal bulan
    for (let i = 0; i < firstDayIndex; i++) {
        let emptyCell = document.createElement('div');
        emptyCell.className = 'calendar-cell empty';
        calendarGrid.appendChild(emptyCell);
    }

    // Membuat sel tanggal aktif dinamis
    for (let day = 1; day <= totalDays; day++) {
        let cell = document.createElement('div');
        cell.className = 'calendar-cell';
        
        let dateNum = document.createElement('div');
        dateNum.className = 'calendar-date-number';
        dateNum.innerText = day;
        cell.appendChild(dateNum);

        // Cari data absensi untuk tanggal ini
        const lookupKey = `${year}-${month + 1}-${day}`;
        const dayRecords = attendancesPerDay[lookupKey] || [];

        // Jika ada karyawan yang terdata kehadirannya, tampilkan badge nama & status mini di dalam sel
        if (dayRecords.length > 0) {
            dayRecords.slice(0, 2).forEach(record => {
                let badge = document.createElement('div');
                badge.className = 'calendar-cell-badge';
                
                // Beri warna background mini badge sesuai status
                if(record.status === 'Hadir') badge.style.backgroundColor = '#4caf50';
                else if(record.status === 'Izin') badge.style.backgroundColor = '#ffc107';
                else if(record.status === 'Sakit') badge.style.backgroundColor = '#2196f3';
                else badge.style.backgroundColor = '#f44336';

                badge.innerText = `${record.name} (${record.status})`;
                cell.appendChild(badge);
            });

            if (dayRecords.length > 2) {
                let moreLabel = document.createElement('div');
                moreLabel.style.fontSize = '9px';
                moreLabel.style.color = '#c2186b';
                moreLabel.innerText = `+${dayRecords.length - 2} lainnya`;
                cell.appendChild(moreLabel);
            }
        }

        cell.onclick = () => showDayDetails(day, month, year, dayRecords);
        calendarGrid.appendChild(cell);
    }
}

function changeCalendar() {
    const selectedMonth = parseInt(selectMonth.value);
    const selectedYear = parseInt(selectYear.value);
    renderCalendar(selectedMonth, selectedYear);
}

// Menampilkan detail pop-up list presensi menggunakan SweetAlert2 ketika kotak tanggal diklik
function showDayDetails(day, month, year, records) {
    let htmlContent = `<p style="margin-bottom:15px; color:#666;">Daftar presensi seluruh karyawan pada tanggal ini:</p>`;
    
    if (records.length === 0) {
        htmlContent += `<div style="padding:10px; background:#fff5f8; border-radius:8px; color:#c2186b; font-weight:600;">Tidak ada data log presensi pada tanggal ini.</div>`;
    } else {
        htmlContent += `<div style="max-height: 250px; overflow-y: auto; text-align: left;">`;
        records.forEach(r => {
            let statusColor = '#f44336';
            if (r.status === 'Hadir') statusColor = '#4caf50';
            else if (r.status === 'Izin') statusColor = '#ffc107';
            else if (r.status === 'Sakit') statusColor = '#2196f3';

            htmlContent += `
            <div style="padding:10px; border-bottom:1px solid #ffe6f3; margin-bottom:8px;">
                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <strong><i class="fa-solid fa-user" style="color:#d63384;"></i> ${r.name}</strong>
                    <span style="background:${statusColor}; color:white; padding:2px 8px; border-radius:8px; font-size:11px; font-weight:bold;">${r.status}</span>
                </div>
                <div style="font-size:12px; color:#777; margin-top:4px;">
                    <i class="fa-solid fa-clock"></i> Jam: ${r.check_in || '-'} s/d ${r.check_out || '-'}
                </div>
                ${r.notes ? `<div style="font-size:12px; color:#555; background:#fff0f6; padding:4px 8px; border-radius:6px; margin-top:4px;"><i class="fa-solid fa-comment-dots"></i> ${r.notes}</div>` : ''}
            </div>`;
        });
        htmlContent += `</div>`;
    }

    Swal.fire({
        title: `📅 Detail Kehadiran: ${day} ${monthNames[month]} ${year}`,
        html: htmlContent,
        confirmButtonColor: '#ff4fa1',
        confirmButtonText: 'Tutup'
    });
}

// Render awal halaman load pertama kali
renderCalendar(currentMonth, currentYear);
</script>

@endsection