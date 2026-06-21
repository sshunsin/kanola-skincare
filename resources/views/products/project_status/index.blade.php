<!DOCTYPE html>
<html>
<head>
    <title>Status Products</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">

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
        position:relative;
    }

    .main-title{
        font-size:26px;
        font-weight:800;
        color:#d63384;
        margin-bottom:20px;
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
        transition: all 0.3s ease;
    }

    .btn-add{
        background:linear-gradient(135deg,#ff4fa1,#ff85c2);
        color:white;
        box-shadow:0 6px 18px rgba(255,79,161,.35);
    }

    .btn-add:hover{
        transform: translateY(-2px);
    }

    /* ===== CARD TABEL ===== */
    .card{
        background:white;
        padding:25px;
        border-radius:22px;
        box-shadow:0 15px 35px rgba(0,0,0,.08);
        margin-top:20px;
    }

    /* ===== FILTER ===== */
    .filter-box{
        margin:22px 0;
    }

    .filter-box select{
        padding:9px 16px;
        border-radius:14px;
        border:none;
        background:#ffe0f0;
        font-weight:600;
        color:#c2186b;
        outline:none;
        cursor:pointer;
    }

    /* ===== TABLE ===== */
    table{
        width:100%;
        border-collapse:collapse;
        background:#fff;
        border-radius:18px;
        overflow:hidden;
    }

    th{
        background:#ffe0f0;
        padding:14px;
        color:#c2186b;
        font-weight:700;
        font-size:13px;
        text-align:left;
    }

    td{
        padding:12px 14px;
        border-bottom:1px solid #ffe6f3;
        font-size:13px;
        vertical-align:middle;
        font-size: 14px;
    }

    tr:last-child td{
        border-bottom:none;
    }

    tr:nth-child(even){
        background:#fff7fc;
    }

    .menu-item.active{
        background:rgba(255,255,255,.35);
        font-weight:700;
    }

    /* ===== STATUS BADGE ===== */
    .status-badge {
        padding: 6px 14px; 
        border-radius: 14px; 
        font-size: 12px; 
        font-weight: 700; 
        color: #fff;
        display: inline-block;
        text-align: center;
    }

    /* ===== ACTION BUTTONS ===== */
    .btn-action{
        font-size:12px;
        font-weight:600;
        color:#d63384;
        text-decoration:none;
        margin-right:6px;
    }

    button.btn-hapus-action {
        background: linear-gradient(135deg, #ff6fa8, #ff8fc9);
        border: none;
        color: white;
        padding: 6px 12px;
        border-radius: 12px;
        cursor: pointer;
        font-size: 12px;
        font-weight: 600;
    }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Dashboard</h2>

    <a class="menu-item" href="{{ route('backend.v1.dashboard') }}">
        <i class="fa-solid fa-chart-line"></i> Dashboard
    </a>

    <a class="menu-item" href="{{ route('backend.v1.products.index') }}">
        <i class="fa-solid fa-box"></i> Data Produk
    </a>

    <div class="submenu">
        <a href="{{ route('backend.v1.categories.index') }}">
            <i class="fa-solid fa-circle-check"></i> Kategori Product
        </a>
        <a href="{{ route('backend.v1.projects.status.index') }}" class="active">
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

<div class="main-content">
    <h2 class="main-title">Status Product 📌</h2>

    {{-- <a class="btn btn-add" href="{{ route('backend.v1.projects.status.create') }}">
        <i class="fa-solid fa-plus"></i> Tambah Status
    </a> --}}

    <div class="filter-box">
        <select id="filterStatus" onchange="filterTable()">
            <option value="">Semua Status</option>
            <option>Coming Soon</option>
            <option>Clinical Trial</option>
            <option>Testing</option>
            <option>Active</option>
            <option>Out of Stock</option>
            <option>Archived</option>
            <option>Discontinued</option>
            <option>Reformulated</option>
            <option>Low Stock</option>
            <option>Limited Edition</option>
            <option>Pending BPOM</option>
            <option>Seasonal</option>
            <option>Rebranding</option>
        </select>
    </div>

    <div class="card" style="overflow-x: auto; width: 100%;">
        <table id="statusTable" style="width: 100%; table-layout: fixed;">
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th style="width: 150px;">Kode Product</th>
                    <th style="width: 180px;">Status</th>
                    <th>Deskripsi</th>
                    <th style="width: 180px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($statuses as $s)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td style="font-weight: 700; color: #d63384;">{{ $s->code }}</td>

                    <td data-status="{{ $s->name }}">
                        <span class="status-badge">
                            {{ $s->name }}
                        </span>
                    </td>

                    <td style="word-break: break-word; white-space: normal; line-height: 1.4;">
                        {{ $s->description ?? 'Tidak ada deskripsi untuk status ini.' }}
                    </td>

                    <td>
                        <a class="btn-action" href="{{ route('backend.v1.projects.status.edit', $s->id) }}">
                            <i class="fa-solid fa-pen-to-square"></i> Edit
                        </a> 
                        
                        {{-- <form action="{{ route('backend.v1.projects.status.destroy', $s->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus status ini?')" style="display:inline;">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" class="btn-hapus-action">
                                <i class="fa-solid fa-trash"></i> Hapus
                            </button>
                        </form> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
const statusColors = {
    "Coming Soon": "linear-gradient(135deg,#9c27b0,#ba68c8)",
    "Clinical Trial": "linear-gradient(135deg,#2196f3,#64b5f6)",
    "Testing": "linear-gradient(135deg,#ff9800,#ffb74d)",
    "Active": "linear-gradient(135deg,#4caf50,#81c784)",
    "Out of Stock": "linear-gradient(135deg,#ff5c8a,#ff8fab)",
    "Archived": "linear-gradient(135deg,#9e9e9e,#bdbdbd)",
    "Discontinued": "linear-gradient(135deg,#f44336,#e57373)",
    "Reformulated": "linear-gradient(135deg,#009688,#4db6ac)",
    "Low Stock": "linear-gradient(135deg,#e91e63,#f06292)",
    "Limited Edition": "linear-gradient(135deg,#673ab7,#9575cd)",
    "Pending BPOM": "linear-gradient(135deg,#00bcd4,#4dd0e1)",
    "Seasonal": "linear-gradient(135deg,#ff5722,#ff8a65)",
    "Rebranding": "linear-gradient(135deg,#3f51b5,#7986cb)"
};

document.querySelectorAll('.status-badge').forEach(updateColor);

function updateColor(el) {
    let statusValue = el.textContent.trim();
    
    if (statusValue.toLowerCase() === 'active') {
        statusValue = 'Active';
    } else if (statusValue.toLowerCase() === 'discontinued') {
        statusValue = 'Discontinued';
    }
    
    el.style.background = statusColors[statusValue] 
        || "linear-gradient(135deg,#607d8b,#90a4ae)";
}

function filterTable() {
    const f = document.getElementById("filterStatus").value;
    document.querySelectorAll("#statusTable tbody tr").forEach((r) => {
        const statusTd = r.querySelector("[data-status]");
        if (!statusTd) return;
        
        const s = statusTd.dataset.status;
        r.style.display = (!f || s.toLowerCase() === f.toLowerCase()) ? "" : "none";
    });
}
</script>

</body>
</html>