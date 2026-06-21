<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori Produk</title>

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
        transition: all 0.3s ease;
    }

    .btn-back{
        background:#ffe1f1;
        color:#c2186b;
    }

    .btn-back:hover{
        background:#ffcce0;
    }

    .btn-save{
        background:linear-gradient(135deg,#ff4fa1,#ff85c2);
        color:white;
        box-shadow:0 6px 18px rgba(255,79,161,.35);
        border:none;
        cursor:pointer;
        width:100%;
        padding:12px 0;
        border-radius:14px;
        justify-content:center;
    }

    .btn-save:hover{
        background:linear-gradient(135deg,#ff85c2,#ff4fa1);
        transform:translateY(-2px);
    }

    .card{
        background:white;
        padding:30px;
        border-radius:22px;
        box-shadow:0 15px 35px rgba(0,0,0,.08);
        max-width:500px;
        width:100%;
    }

    label{
        font-weight:600;
        color:#d63384;
        display:block;
        margin-bottom:8px;
        font-size:14px;
    }

    .input-group{
        margin-bottom:20px;
    }

    .input-wrapper{
        position:relative;
    }

    .input-wrapper i{
        position:absolute;
        top:50%;
        left:15px;
        transform:translateY(-50%);
        color:#d63384;
        pointer-events:none;
    }

    /* Styling input text agar serasi dengan select sebelumnya */
    input[type="text"], select{
        width:100%;
        padding:12px 15px 12px 42px;
        border-radius:14px;
        border:1px solid #ffd3ec;
        outline:none;
        font-size:14px;
        transition: border-color 0.3s, box-shadow 0.3s;
        background-color: white;
    }

    input[type="text"]:focus, select:focus{
        border-color:#ff4d94;
        box-shadow:0 0 8px rgba(255,77,148,.25);
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

<div class="main-content">
    <h2 class="main-title">Tambah Kategori Produk ➕</h2>

    <div style="margin-bottom:18px;">
        <a class="btn btn-back" href="{{ route('backend.v1.categories.index') }}">
            <i class="fa-solid fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card">
        <form action="{{ route('backend.v1.categories.store') }}" method="POST">
            @csrf

            <div class="input-group">
                <label>Nama Kategori</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-list"></i>
                    <input type="text" name="category_name" list="category_options" placeholder="Pilih atau ketik kategori baru..." required autocomplete="off">
                    
                    <datalist id="category_options">
                        <option value="Facial Wash">
                        <option value="Toner">
                        <option value="Serum">
                        <option value="Moisturizer">
                        <option value="Sunscreen">
                        <option value="Cleanser">
                        <option value="Mask">
                        <option value="Lip Care">
                        <option value="Eye Care">
                        <option value="Face Mist">
                        <option value="Treatment">
                    </datalist>
                </div>
            </div>

            <div class="input-group">
                <label>Status</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-circle-info"></i>
                    <select name="is_active">
                        <option value="1">Aktif</option>
                        <option value="0">Nonaktif</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-save">
                <i class="fa-solid fa-floppy-disk"></i> Simpan Kategori
            </button>
        </form>
    </div>
</div>

</body>
</html>