<!DOCTYPE html>
<html>
<head>
    <title>Detail Produk - Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;800&display=swap" rel="stylesheet">
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
    .main-content{
        flex:1;
        padding:40px 45px;
        overflow-y:auto;
        display:flex;
        justify-content:center;
    }
    .content-wrapper{
        width:100%;
        max-width:900px;
    }
    .main-title{
        font-size:26px;
        font-weight:800;
        color:#d63384;
        margin-bottom:25px;
    }
    .btn-container{
        display:flex;
        align-items:center;
        gap:12px;
        margin-bottom:20px;
    }
    .btn{
        padding:10px 20px;
        border-radius:14px;
        font-size:13px;
        font-weight:600;
        text-decoration:none;
        border:none;
        display:inline-flex;
        align-items:center;
        gap:8px;
        transition:all 0.3s ease;
        cursor:pointer;
    }
    .btn-back{
        background:#ffe1f1;
        color:#c2186b;
    }
    .btn-back:hover{
        background:#ffcce0;
    }
    .btn-edit{
        background:linear-gradient(135deg,#ff4fa1,#ff85c2);
        color:white;
        box-shadow:0 6px 18px rgba(255,79,161,.35);
    }
    .btn-edit:hover{
        background:linear-gradient(135deg,#ff85c2,#ff4fa1);
        transform:translateY(-2px);
    }
    .btn-delete{
        background:linear-gradient(135deg,#f44336,#ff6b6b);
        color:white;
        box-shadow:0 6px 18px rgba(244,67,54,.3);
    }
    .btn-delete:hover{
        background:linear-gradient(135deg,#ff6b6b,#f44336);
        transform:translateY(-2px);
    }
    .detail-card{
        background:white;
        padding:35px;
        border-radius:24px;
        box-shadow:0 15px 35px rgba(0,0,0,.08);
        display:grid;
        grid-template-columns:320px 1fr;
        gap:35px;
    }
    .product-image-section{
        display:flex;
        flex-direction:column;
        align-items:center;
    }
    .display-img{
        width:100%;
        height:320px;
        object-fit:cover;
        border-radius:20px;
        border:2px solid #ffedea;
        box-shadow:0 8px 20px rgba(214,51,132,.1);
        background:#fffafc;
    }
    .product-info-section{
        display:flex;
        flex-direction:column;
        justify-content:space-between;
    }
    .info-header{
        border-bottom:2px dashed #ffe6f3;
        padding-bottom:15px;
        margin-bottom:20px;
    }
    .product-name{
        font-size:28px;
        font-weight:800;
        color:#c2186b;
        margin:0 0 8px 0;
    }
    .product-price{
        font-size:22px;
        font-weight:700;
        color:#d63384;
        margin:0;
    }
    .specs-grid{
        display:grid;
        grid-template-columns:repeat(2,1fr);
        gap:18px;
        margin-bottom:20px;
    }
    .spec-item{
        background:#fff5fa;
        padding:12px 16px;
        border-radius:14px;
        border:1px solid #ffe1f1;
        display:flex;
        align-items:center;
        gap:12px;
    }
    .spec-item i{
        font-size:18px;
        color:#ff4fa1;
        width:24px;
        text-align:center;
    }
    .spec-label{
        font-size:11px;
        color:#a06684;
        display:block;
        text-transform:uppercase;
        font-weight:600;
        letter-spacing:0.5px;
    }
    .spec-value{
        font-size:14px;
        font-weight:600;
        color:#4a323e;
    }
    .description-box{
        background:#fffafc;
        border-left:4px solid #ff4fa1;
        padding:15px 18px;
        border-radius:4px 14px 14px 4px;
        margin-top:5px;
    }
    .description-box h4{
        margin:0 0 6px 0;
        color:#c2186b;
        font-size:13px;
        text-transform:uppercase;
        letter-spacing:0.5px;
    }
    .description-box p{
        margin:0;
        font-size:13.5px;
        color:#614c56;
        line-height:1.6;
    }
    .status-badge{
        display:inline-block;
        padding:5px 12px;
        border-radius:12px;
        color:white;
        font-weight:600;
        font-size:12px;
        text-transform:uppercase;
    }
    .status-active{ background:linear-gradient(135deg,#4caf50,#66bb6a); }
    .status-discontinued{ background:linear-gradient(135deg,#f44336,#ff6b6b); }
    @media(max-width:850px){
        .detail-card{ grid-template-columns:1fr; gap:25px; padding:25px; }
        .display-img{ height:260px; }
        .specs-grid{ grid-template-columns:1fr; }
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

<div class="main-content">
    <div class="content-wrapper">
        <h2 class="main-title">Detail Produk Skincare 🌸</h2>

        <div class="btn-container">
            <a href="{{ route('backend.v1.products.index') }}" class="btn btn-back">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
            </a>
            <a href="{{ route('backend.v1.products.edit', $product->id) }}" class="btn btn-edit">
                <i class="fa-solid fa-pen-to-square"></i> Edit Data
            </a>
            <form action="{{ route('backend.v1.products.destroy') }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini beserta seluruh progress batch terkait?')">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">
                <button type="submit" class="btn btn-delete">
                    <i class="fa-solid fa-trash"></i> Hapus Produk
                </button>
            </form>
        </div>

        <div class="detail-card">
            <div class="product-image-section">
                @if($product->image)
                    @if(file_exists(public_path('assets/img/'.$product->image)))
                        <img src="{{ asset('assets/img/'.$product->image) }}" alt="{{ $product->name }}" class="display-img">
                    @else
                        <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="display-img">
                    @endif
                @else
                    <img src="{{ asset('assets/img/sampleproduk.jpg') }}" alt="No Image" class="display-img">
                @endif
            </div>

            <div class="product-info-section">
                <div>
                    <div class="info-header">
                        <h3 class="product-name">{{ $product->name }}</h3>
                        <p class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>

                    <div class="specs-grid">
                        <div class="spec-item">
                            <i class="fa-solid fa-list"></i>
                            <div>
                                <span class="spec-label">Kategori</span>
                                <span class="spec-value">{{ $product->category->category_name ?? 'Tidak ada' }}</span>
                            </div>
                        </div>
                        <div class="spec-item">
                            <i class="fa-solid fa-hashtag"></i>
                            <div>
                                <span class="spec-label">Batch Number</span>
                                <span class="spec-value">{{ $product->batch_number ?? 'Empty' }}</span>
                            </div>
                        </div>
                        <div class="spec-item">
                            <i class="fa-solid fa-boxes-stacked"></i>
                            <div>
                                <span class="spec-label">Stok Produk</span>
                                <span class="spec-value">{{ $product->stock }} Unit</span>
                            </div>
                        </div>
                        <div class="spec-item">
                            <i class="fa-solid fa-circle-info"></i>
                            <div>
                                <span class="spec-label">Status</span>
                                <span class="status-badge {{ $product->status == 'active' ? 'status-active' : 'status-discontinued' }}">
                                    {{ ucfirst($product->status) }}
                                </span>
                            </div>
                        </div>
                        <div class="spec-item">
                            <i class="fa-solid fa-calendar-check"></i>
                            <div>
                                <span class="spec-label">Tanggal Produksi</span>
                                <span class="spec-value">
                                    {{ $product->manufactured_at ? date('d M Y', strtotime($product->manufactured_at)) : 'Empty' }}
                                </span>
                            </div>
                        </div>
                        <div class="spec-item">
                            <i class="fa-solid fa-calendar-xmark"></i>
                            <div>
                                <span class="spec-label">Tanggal Kedaluwarsa</span>
                                <span class="spec-value">
                                    {{ $product->expired_at ? date('d M Y', strtotime($product->expired_at)) : 'Empty' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="description-box">
                    <h4>Benefits</h4>
                    <p>{{ $product->benefits ?? 'Tidak ada informasi manfaat untuk produk ini.' }}</p>
                </div>

                <div class="description-box" style="margin-top: 15px;">
                    <h4>Ingredients</h4>
                    <p>{{ $product->ingredients ?? 'Tidak ada informasi kandungan untuk produk ini.' }}</p>
                </div>

                <div class="description-box" style="margin-top: 15px;">
                    <h4>How To Use</h4>
                    <p>{{ $product->how_to_use ?? 'Tidak ada petunjuk penggunaan untuk produk ini.' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>