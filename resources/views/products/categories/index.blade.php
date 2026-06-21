<!DOCTYPE html>
<html>
<head>
    <title>Kategori Produk</title>

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">

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
        transition:.3s;
        box-shadow:0 4px 12px rgba(0,0,0,.15);
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
        box-shadow:0 2px 8px rgba(0,0,0,.1);
    }

    .submenu a:hover{
        background:rgba(255,255,255,.35);
        transform:translateX(6px);
    }

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

    .btn-add{
        background:linear-gradient(135deg,#ff4fa1,#ff85c2);
        color:white;
        box-shadow:0 6px 18px rgba(255,79,161,.35);
    }

    .btn-back{
        background:#ffe1f1;
        color:#c2186b;
    }

    .card{
        background:white;
        padding:25px;
        border-radius:22px;
        box-shadow:0 15px 35px rgba(0,0,0,.08);
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
    </style>
</head>

<body>

<!-- SIDEBAR -->
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

<!-- MAIN CONTENT -->
<div class="main-content">
    <h2 class="main-title">Kategori Produk 💄</h2>

    <div style="display:flex; gap:12px; margin-bottom:15px;">
        <a class="btn btn-back" href="{{ route('backend.v1.dashboard') }}">
            <i class="fa-solid fa-arrow-left"></i> Dashboard
        </a>

        <a class="btn btn-add" href="{{ route('backend.v1.categories.create') }}">
            <i class="fa-solid fa-plus"></i> Tambah Kategori
        </a>
    </div>

    <div class="card">
        <table>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>

            @foreach($categories as $c)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td >{{ $c->category_name }}</td>
                <td>
                    <a class="btn-action" href="{{ route('backend.v1.categories.edit',$c->id) }}">
                        <i class="fa-solid fa-pen-to-square"></i> Edit
                    </a> |
                    <form action="{{ route('backend.v1.categories.destroy',$c->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus kategori?')">
                            <i class="fa-solid fa-trash"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
</div>

</body>
</html>