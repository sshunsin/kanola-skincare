<!DOCTYPE html>
<html>
<head>
    <title>Products Complain</title>

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;800&display=swap" rel="stylesheet">

    <!-- FONT AWESOME ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
    *{
        font-family:'Poppins',sans-serif;
        box-sizing:border-box;
    }

    body{
        background: #ffc7eb;
        background: linear-gradient(168deg, rgba(255, 199, 235, 1) 0%, rgba(255, 171, 226, 1) 50%, rgba(255, 255, 255, 1) 100%);
        margin:0;
        display:flex;
        height:100vh;
        overflow:hidden;
    }

    /* ===== SIDEBAR ===== */
    .sidebar{
        width:250px;
        background: #ff69b4;
        background: linear-gradient(169deg, rgba(255, 105, 180, 1) 52%, rgba(255, 255, 255, 1) 100%);
        padding:30px 22px;
        color:white;
        border-top-right-radius:40px;
        border-bottom-right-radius:40px;
        box-shadow:8px 0 25px rgba(255,77,148,.35);
        overflow-y:auto;
    }

    .sidebar h2{
        font-weight:800;
        margin-bottom:35px;
        letter-spacing:1px;
    }

    .menu-item{
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

    .menu-item:hover{
        background:rgba(255,255,255,.25);
        transform:translateX(6px);
    }

    .menu-item i{
        width:22px;
        font-size:16px;
    }

    .submenu{
        margin:8px 0 16px 30px;
        display:flex;
        flex-direction:column;
        gap:8px;
    }

    .submenu a{
        font-size:14px;
        padding:8px 16px;
        border-radius:14px;
        color:white;
        text-decoration:none;
        transition:all .3s ease;
        opacity:.85;
        box-shadow:0 2px 8px rgba(0,0,0,0.1);
    }

    .submenu a:hover{
        background:rgba(255,255,255,.35);
        opacity:1;
        transform:translateX(6px);
    }

    /* ===== MAIN CONTENT ===== */
    .main-content{
        flex:1;
        padding:40px 45px;
        overflow-y:auto;
    }

    .main-title{
        font-size:26px;
        font-weight:800;
        color:#d63384;
        margin-bottom:25px;
    }

    .btn{
        padding:9px 18px;
        border-radius:14px;
        font-size:13px;
        font-weight:600;
        text-decoration:none;
        display:inline-flex;
        align-items:center;
        gap:6px;
        transition:all .3s ease;
    }

    .btn-back{
        background:#ffe1f1;
        color:#c2186b;
    }

    .btn-back:hover{
        background:#ffcce0;
    }

    .btn-add{
        background:linear-gradient(135deg,#ff4fa1,#ff85c2);
        color:white;
        box-shadow:0 6px 18px rgba(255,79,161,.35);
    }

    .card{
        background:white;
        padding:25px;
        border-radius:22px;
        box-shadow:0 15px 35px rgba(0,0,0,.08);
        margin-top:20px;
        overflow-x:auto;
    }

    table{
        width:100%;
        border-collapse:collapse;
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
        font-size: 14px;
    }

    tr:last-child td{
        border-bottom:none;
    }

    tr:nth-child(even){
        background:#fff7fc;
    }

    .btn-action{
        font-size:12px;
        font-weight:600;
        color:#d63384;
        text-decoration:none;
        margin-right:6px;
    }

    button{
        background:linear-gradient(135deg,#ff6fa8,#ff8fc9);
        border:none;
        color:white;
        padding:6px 12px;
        border-radius:12px;
        cursor:pointer;
    }

    button:hover{
        opacity:.9;
    }

    /* ===== WARNA KHUSUS TABLE ===== */
    .score {
        font-weight:600;
        padding:6px 10px;
        border-radius:12px;
        color:white;
        text-align:center;
    }
    .score.high { background:#28a745; }   /* hijau */
    .score.medium { background:#ffc107; } /* kuning */
    .score.low { background:#dc3545; }    /* merah */

    .risk {
        font-weight:600;
        padding:4px 8px;
        border-radius:10px;
        color:white;
        text-align:center;
    }
    .risk.low { background:#28a745; }
    .risk.medium { background:#ffc107; }
    .risk.high { background:#dc3545; }

    .quality {
        font-weight:600;
        padding:4px 8px;
        border-radius:10px;
        color:white;
        text-align:center;
    }
    .quality.poor { background:#dc3545; }
    .quality.fair { background:#fd7e14; }
    .quality.good { background:#0d6efd; }
    .quality.excellent { background:#28a745; }

    .decision {
        font-weight:600;
        padding:4px 8px;
        border-radius:10px;
        color:white;
        text-align:center;
    }
    .decision.continue { background:#28a745; }
    .decision.revision { background:#fd7e14; }
    .decision.hold { background:#ffc107; }
    .decision.terminated { background:#dc3545; }

    .date {
        font-weight: 600;
        padding: 6px 10px;
        border-radius: 8px;
        background: #ffe0f0;
        color: #c2186b;
        text-align: center;
        white-space: nowrap;
        display: inline-block;
    }
    </style>
</head>
<body>

<!-- ===== SIDEBAR ===== -->
<div class="sidebar">
    <h2>Dashboard</h2>

    <a class="menu-item" href="{{ route('backend.v1.dashboard') }}">
        <i class="fa-solid fa-chart-line"></i> Dashboard
    </a>

    <a class="menu-item" href="{{ route('backend.v1.products.index') }}">
        <i class="fa-solid fa-box"></i> Produk
    </a>

    <div class="submenu">
            <a href="{{ route('backend.v1.categories.index') }}">
                <i class="fa-solid fa-circle-check"></i> Kategori Product
            </a>
            <a href="{{ route('backend.v1.projects.status.index') }}">
                <i class="fa-solid fa-circle-check"></i> Status Product
            </a>
            <a href="{{ route('backend.v1.projects.timeline.index') }}">
                <i class="fa-solid fa-calendar-days"></i> Batch Product
            </a>
            <a href="{{ route('backend.v1.projects.progress.index') }}">
                <i class="fa-solid fa-chart-line"></i> Progress Product
            </a>
            <a href="{{ route('backend.v1.projects.evaluation.index') }}">
                <i class="fa-solid fa-star"></i> Product Complain
            </a>
        </div>

    <a class="menu-item" href="{{ route('backend.v1.divisions.index') }}">
        <i class="fa-solid fa-building"></i> Divisi
    </a>

    <a class="menu-item" href="{{ route('backend.v1.employees.index') }}">
        <i class="fa-solid fa-users"></i> Karyawan
    </a>

    <a class="menu-item" href="{{ route('backend.v1.attendances.index') }}">
        <i class="fa-solid fa-clock"></i> Absensi
    </a>
</div>

<!-- ===== MAIN CONTENT ===== -->
<div class="main-content">
    <h2 class="main-title">Product Complain</h2>

    <div class="action-header-row" style="display: flex; justify-content: flex-start; align-items: center; flex-wrap: wrap; gap: 15px; margin-bottom: 15px;">
        <a class="btn btn-back" href="{{ route('backend.v1.dashboard') }}">
            <i class="fa-solid fa-arrow-left"></i> Kembali
        </a>
        
        <a class="btn btn-add" href="{{ route('backend.v1.projects.evaluation.create') }}">
            <i class="fa-solid fa-plus"></i> Tambah Complain
        </a>

        <div class="search-container" style="position: relative; display: inline-block;">
            <i class="fa-solid fa-magnifying-glass" style="position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: #c2186b;"></i>
            <input type="text" id="searchEvaluationCode" onkeyup="filterEvaluationTable()" placeholder="Cari kode complain..." style="padding: 9px 16px 9px 38px; border-radius: 14px; border: none; background: #ffe0f0; font-weight: 600; color: #c2186b; outline: none; width: 260px;">
        </div>
    </div>

    <div class="card">
        <table id="evaluationTable">
            <tr>
                <th>Kode</th>
                <th>Skor</th>
                <th>Risiko</th>
                <th>Kualitas</th>
                <th>Keputusan</th>
                <th style="min-width: 120px;">Tanggal</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>

            @foreach($evaluations as $e)
            <tr data-code="{{ $e->code }}">
                <td style="font-weight: 700; color: #d63384; font-size: 14px;">{{ $e->code }}</td>
                
                <td>
                    <span class="score {{ $e->score >= 85 ? 'high' : ($e->score >= 60 ? 'medium' : 'low') }}">
                        {{ $e->score }}
                    </span>
                </td>
                <td><span class="risk {{ $e->risk_level }}">{{ ucfirst($e->risk_level) }}</span></td>
                <td><span class="quality {{ $e->quality }}">{{ ucfirst($e->quality) }}</span></td>
                <td><span class="decision {{ $e->decision }}">{{ ucfirst($e->decision) }}</span></td>
                <td><span class="date">{{ $e->evaluation_date }}</span></td>
                <td>{{ $e->manager_notes }}</td>
                <td>
                    <a class="btn-action" href="{{ route('backend.v1.projects.evaluation.edit',$e->id) }}">
                        <i class="fa-solid fa-pen-to-square"></i> Edit
                    </a>
                    <form method="POST" action="{{ route('backend.v1.projects.evaluation.destroy',$e->id) }}" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Hapus complain ini?')">
                            <i class="fa-solid fa-trash"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

<script>
    function filterEvaluationTable() {
        const searchQuery = document.getElementById("searchEvaluationCode").value.toLowerCase().trim();

        document.querySelectorAll("#evaluationTable tbody tr").forEach((row) => {
            if (!row.dataset.code) return;

            const rowCode = row.dataset.code.toLowerCase();
            const matchesSearch = rowCode.includes(searchQuery);

            if (matchesSearch) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }
</script>

</body>
</html>