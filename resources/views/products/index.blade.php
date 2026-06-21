<!DOCTYPE html>
<html>
<head>
    <title>Products - Dashboard</title>

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

    /* ===== CARD TABEL ===== */
    .card{
        background:white;
        padding:25px;
        border-radius:22px;
        box-shadow:0 15px 35px rgba(0,0,0,.08);
        margin-top:20px;
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

    .product-img{
        width:80px;
        height:80px;
        object-fit:cover;
        border-radius:12px;
        border:1px solid #ffd3ec;
        display:block;
    }

    /* STATUS */
    .status{
        display:inline-block;
        padding:4px 10px;
        border-radius:12px;
        color:white;
        font-weight:600;
        font-size:12px;
        text-align:center;
    }

    .status-active{ background:linear-gradient(135deg,#4caf50,#66bb6a);}
    .status-discontinued{ background:linear-gradient(135deg,#f44336,#ff6b6b);}
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
                <i class="fa-star fa-solid"></i> Product Complain
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
        <h2 class="main-title">Daftar Produk Skincare 💗</h2>

        <div style="display:flex; gap:12px; margin-bottom:15px;">
            <a class="btn btn-back" href="{{ route('backend.v1.dashboard') }}">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
            </a>

            <a class="btn btn-add" href="{{ route('backend.v1.products.create') }}">
                <i class="fa-solid fa-plus"></i> Tambah Produk
            </a>
        </div>

        <div class="card" style="overflow-x: auto; width: 100%;">
    <table style="width: 100%; table-layout: fixed;">
        <thead>
            <tr>
                <th style="width: 110px;">Gambar</th>
                <th style="width: 160px;">Nama Product</th>
                <th style="width: 120px;">Kategori</th>
                <th style="width: 100px;">Batch</th>
                <th style="width: 70px;">Stock</th>
                <th style="width: 110px;">Harga</th>
                <th style="width: 180px;">Benefits</th>
                <th style="width: 180px;">Ingredients</th>
                <th style="width: 180px;">How To Use</th>
                <th style="width: 100px;">Status</th>
                <th style="width: 180px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>
                        @if($product->image)
                            @if(file_exists(public_path('assets/img/'.$product->image)))
                                <img src="{{ asset('assets/img/'.$product->image) }}" alt="{{ $product->name }}" width="60" style="object-fit: cover; border-radius: 8px;">
                            @else
                                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" width="60" style="object-fit: cover; border-radius: 8px;">
                            @endif
                        @else
                            <img src="{{ asset('assets/img/sampleproduk.jpg') }}" alt="No Image" width="60" style="object-fit: cover; border-radius: 8px;">
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->category_name ?? 'Tanpa Kategori' }}</td>
                    <td>{{ $product->batch_number }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>{{ $product->benefits ?? 'Tidak ada' }}</td>
                    <td>{{ $product->ingredients ?? 'Tidak ada' }}</td>
                    <td>{{ $product->how_to_use ?? 'Tidak ada' }}</td>
                    <td>{{ ucfirst($product->status) }}</td>
                    <td>
                        <a class="btn-action" href="{{ route('backend.v1.products.show', $product->id) }}">
                            <i class="fa-solid fa-eye"></i> Detail
                        </a>
                        <a class="btn-action" href="{{ route('backend.v1.products.edit', $product->id) }}">
                            <i class="fa-solid fa-pen-to-square"></i> Edit
                        </a>
                        <form action="{{ route('backend.v1.products.destroy') }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <button onclick="return confirm('Yakin hapus produk?')">
                                <i class="fa-solid fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>

</body>
</html>