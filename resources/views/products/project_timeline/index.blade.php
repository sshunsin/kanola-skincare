<!DOCTYPE html>
<html>
<head>
    <title>Batch & Progress Product</title>

    {{-- GOOGLE FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">

    {{-- FONT AWESOME --}}
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
        transition:.35s;
    }

    .menu-item:hover{
        background:rgba(255,255,255,.25);
        transform:translateX(6px);
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
        opacity:.85;
        transition:.3s;
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
    }

    .btn-back{
        background:#ffe1f1;
        color:#c2186b;
    }

    .btn-add{
        background:linear-gradient(135deg,#ff4fa1,#ff85c2);
        color:white;
        box-shadow:0 6px 18px rgba(255,79,161,.35);
    }

    table{
        width:100%;
        border-collapse:collapse;
        background:white;
        border-radius:18px;
        overflow:hidden;
        box-shadow:0 15px 35px rgba(0,0,0,.08);
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
        font-size: 14px;
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

    /* ===== STATUS COLORS ===== */
    .status{
        display:inline-block;
        padding:5px 12px;
        border-radius:14px;
        font-size:12px;
        font-weight:600;
        color:white;
    }

    .status-planning { background:#9e9e9e; }      /* Planning */
    .status-on-progress { background:#ff9800; }   /* On Progress */
    .status-completed { background:#4caf50; }     /* Completed */
    .status-delayed { background:#f44336; }       /* Delayed */
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

    <!-- SUB MENU PROJECT -->
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
    <h2 class="main-title">Batch Product</h2>

    <a class="btn btn-back" href="{{ route('backend.v1.dashboard') }}">
        <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
    </a>

    <div style="margin-bottom: 20px;"></div>

    <div class="action-header-row" style="display: flex; justify-content: flex-start; align-items: center; flex-wrap: wrap; gap: 20px; margin-bottom: 20px;">
        <a class="btn btn-add" href="{{ route('backend.v1.projects.timeline.create') }}">
            <i class="fa-solid fa-plus"></i> Tambah Batch
        </a>

        <div class="controls-right" style="display: flex; align-items: center; gap: 15px;">
            <select id="filterStatus" class="filter-box-select" onchange="filterTimelineTable()" style="padding: 9px 16px; border-radius: 14px; border: none; background: #ffe0f0; font-weight: 600; color: #c2186b; outline: none; cursor: pointer;">
                <option value="">Semua Status</option>
                <option value="planning">Planning</option>
                <option value="on-progress">On Progress</option>
                <option value="completed">Completed</option>
                <option value="delayed">Delayed</option>
            </select>

            <div class="search-container" style="position: relative; display: inline-block;">
                <i class="fa-solid fa-magnifying-glass" style="position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: #c2186b;"></i>
                <input type="text" id="searchCode" class="search-input" onkeyup="filterTimelineTable()" placeholder="Cari kode batch (Contoh: BP-SR...)" style="padding: 9px 16px 9px 38px; border-radius: 14px; border: none; background: #ffe0f0; font-weight: 600; color: #c2186b; outline: none; width: 280px;">
            </div>
        </div>
    </div>

    <table id="timelineTable">
        <tr>
            <th>Kode</th>
            <th>Tahap</th>
            <th>Mulai</th>
            <th>Deadline</th>
            <th>Status</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>

        @foreach($timelines as $t)
        <tr data-code="{{ $t->code }}" data-status="{{ strtolower(str_replace([' ', '_'], '-', trim($t->status))) }}">
            <td style="font-weight: 700; color: #d63384;">{{ $t->code }}</td>
            <td>{{ $t->title }}</td>
            <td>{{ $t->start_date }}</td>
            <td>{{ $t->end_date }}</td>
            <td>
                @php
                    $statusClass = strtolower(str_replace([' ', '_'], '-', trim($t->status)));
                @endphp
                <span class="status status-{{ $statusClass }}">
                    {{ ucfirst(str_replace(['_','-'],' ',$t->status)) }}
                </span>
            </td>
            <td>{{ $t->notes }}</td>
            <td>
                <a class="btn-action" href="{{ route('backend.v1.projects.timeline.edit',$t->id) }}">
                    <i class="fa-solid fa-pen-to-square"></i> Edit
                </a> |
                <form action="{{ route('backend.v1.projects.timeline.destroy',$t->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Hapus Batch ini?')">
                        <i class="fa-solid fa-trash"></i> Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

<script>
    function filterTimelineTable() {
        const searchQuery = document.getElementById("searchCode").value.toLowerCase().trim();
        const filterStatus = document.getElementById("filterStatus").value.toLowerCase();

        document.querySelectorAll("#timelineTable tbody tr").forEach((row) => {
            const rowCode = row.dataset.code ? row.dataset.code.toLowerCase() : "";
            const rowStatus = row.dataset.status ? row.dataset.status.toLowerCase() : "";

            const matchesSearch = rowCode.includes(searchQuery);
            const matchesStatus = !filterStatus || rowStatus === filterStatus;

            if (matchesSearch && matchesStatus) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }
</script>

</body>
</html>