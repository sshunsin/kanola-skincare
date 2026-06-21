<!DOCTYPE html>
<html>
<head>
    <title>Edit Timeline Proyek</title>

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

        .form-card{
            background:white;
            padding:30px;
            border-radius:22px;
            box-shadow:0 15px 35px rgba(0,0,0,.08);
            max-width:700px;
        }

        label{
            font-weight:600;
            color:#c2186b;
            margin-bottom:6px;
            display:block;
        }

        input, select, textarea{
            width:100%;
            padding:12px 14px;
            border-radius:14px;
            border:1px solid #ffd1e8;
            margin-bottom:18px;
            outline:none;
        }

        textarea{
            resize:none;
            height:90px;
        }

        button{
            background:linear-gradient(135deg,#ff4fa1,#ff85c2);
            border:none;
            color:white;
            padding:12px 20px;
            border-radius:16px;
            font-weight:600;
            cursor:pointer;
            box-shadow:0 6px 18px rgba(255,79,161,.35);
        }

        button:hover{
            opacity:.9;
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
    <h2 class="main-title">Edit Batch Product</h2>

    <a class="btn btn-back" href="{{ route('backend.v1.projects.timeline.index') }}">
        <i class="fa-solid fa-arrow-left"></i> Kembali ke Batch Product
    </a>

    <br><br>

    <div class="form-card">
        <form method="POST" action="{{ route('backend.v1.projects.timeline.update', $timeline->id) }}">
            @csrf
            @method('PUT')

            <label>Kode</label>
            <input type="text" name="code" value="{{ $timeline->code }}" readonly style="background-color: #f3f4f6; cursor: not-allowed; border-color: #ffd1e8;">

            <label>Judul Tahap</label>
            <input type="text" name="title" value="{{ $timeline->title }}" required>

            <label>Tanggal Mulai</label>
            <input type="date" name="start_date" value="{{ $timeline->start_date }}" required>

            <label>Deadline</label>
            <input type="date" name="end_date" value="{{ $timeline->end_date }}" required>

            <label>Status</label>
            <select name="status" required>
                <option value="planning" {{ $timeline->status=='planning'?'selected':'' }}>Planning</option>
                <option value="on_progress" {{ $timeline->status=='on_progress'?'selected':'' }}>On Progress</option>
                <option value="completed" {{ $timeline->status=='completed'?'selected':'' }}>Completed</option>
                <option value="delayed" {{ $timeline->status=='delayed'?'selected':'' }}>Delayed</option>
            </select>

            <label>Keterangan</label>
            <textarea name="notes">{{ $timeline->notes }}</textarea>

            <button type="submit">
                <i class="fa-solid fa-save"></i> Update Batch
            </button>
        </form>
    </div>
</div>

</body>
</html>