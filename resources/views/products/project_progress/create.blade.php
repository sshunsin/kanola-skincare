<!DOCTYPE html>
<html>
<head>
    <title>Tambah Progress Product</title>

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
            transition:.3s;
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
            color:white;
            text-decoration:none;
            font-size:14px;
            padding:8px 16px;
            border-radius:14px;
            opacity:.85;
        }

        .submenu a:hover{
            background:rgba(255,255,255,.35);
            opacity:1;
            transform:translateX(6px);
        }

        /* ===== MAIN ===== */
        .main-content{
            flex:1;
            padding:40px 45px;
            overflow-y:auto;
        }

        .page-title{
            font-size:26px;
            font-weight:800;
            color:#d63384;
            margin-bottom:25px;
        }

        .card{
            background:white;
            border-radius:20px;
            padding:30px 35px;
            max-width:650px;
            box-shadow:0 18px 40px rgba(0,0,0,.1);
        }

        label{
            display:block;
            font-weight:600;
            color:#c2186b;
            margin-bottom:6px;
            margin-top:15px;
        }

        input, textarea, select{
            width:100%;
            padding:10px 14px;
            border-radius:14px;
            border:1px solid #ffd1e8;
            outline:none;
            font-size:14px;
        }

        input:focus, textarea:focus, select:focus{
            border-color:#ff4d94;
            box-shadow:0 0 0 2px rgba(255,77,148,.2);
        }

        textarea{
            resize:none;
            min-height:90px;
        }

        .btn{
            display:inline-flex;
            align-items:center;
            gap:6px;
            padding:10px 20px;
            border-radius:16px;
            font-size:13px;
            font-weight:600;
            text-decoration:none;
            border:none;
            cursor:pointer;
        }

        .btn-back{
            background:#ffe1f1;
            color:#c2186b;
        }

        .btn-save{
            background:linear-gradient(135deg,#ff4fa1,#ff85c2);
            color:white;
            box-shadow:0 6px 18px rgba(255,79,161,.35);
            margin-top:25px;
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
    <h2 class="page-title">Tambah Progress Product ➕</h2>

    <a class="btn btn-back" href="{{ route('backend.v1.projects.progress.index') }}">
        <i class="fa-solid fa-arrow-left"></i> Progress Product
    </a>

    <a class="btn btn-back" href="{{ route('backend.v1.dashboard') }}">
        <i class="fa-solid fa-house"></i> Dashboard
    </a>

    <br><br>

    <div class="card">
        <form method="POST" action="{{ route('backend.v1.projects.progress.store') }}">
            @csrf

            <label>Kode</label>
            <input type="text" name="code" placeholder="PP-1-TR-KNL-001" required>

            <label>Tahap</label>
            <input type="text" name="stage" placeholder="Development" required>

            <label>Status</label>
            <select name="status" required>
                <option value="">-- Pilih Status --</option>
                <option value="Planning">Planning</option>
                <option value="On Progress">On Progress</option>
                <option value="Completed">Completed</option>
                <option value="Delayed">Delayed</option>
            </select>

            <label>Progress (%)</label>
            <input type="number" name="progress_percent" min="0" max="100" required>

            <label>Tanggal Update</label>
            <input type="date" name="update_date" required>

            <label>Keterangan</label>
            <textarea name="description"></textarea>

            <button class="btn btn-save" type="submit">
                <i class="fa-solid fa-plus"></i> Simpan Progress
            </button>
        </form>
    </div>
</div>

</body>
</html>