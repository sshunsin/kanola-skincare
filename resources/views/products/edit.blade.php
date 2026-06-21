<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk - Dashboard</title>
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
        max-width:800px;
    }
    .main-title{
        font-size:26px;
        font-weight:800;
        color:#d63384;
        margin-bottom:25px;
        text-align:left;
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
        margin-bottom:20px;
    }
    .btn-back:hover{
        background:#ffcce0;
    }
    button.submit-btn{
        background:linear-gradient(135deg,#ff4fa1,#ff85c2);
        color:white;
        font-weight:600;
        font-size:14px;
        border:none;
        border-radius:12px;
        padding:12px 0;
        cursor:pointer;
        width:100%;
        margin-top:10px;
        transition: all 0.3s ease;
    }
    button.submit-btn:hover{
        background:linear-gradient(135deg,#ff85c2,#ff4fa1);
        transform:translateY(-2px);
        box-shadow:0 6px 18px rgba(255,79,161,.35);
    }
    .form-card{
        background:white;
        padding:25px 30px;
        border-radius:22px;
        box-shadow:0 15px 35px rgba(0,0,0,.08);
        display:grid;
        grid-template-columns:repeat(2,1fr);
        gap:20px;
        width:100%;
    }
    .form-card .full-width{ grid-column: span 2; }
    .form-card label{
        display:block;
        margin-bottom:8px;
        font-weight:500;
        color:#d63384;
        font-size:14px;
    }
    .form-card input,
    .form-card select,
    .form-card textarea{
        width:100%;
        padding:10px 12px;
        border-radius:12px;
        border:1px solid #ffcce6;
        font-size:14px;
        transition:border-color 0.3s, box-shadow 0.3s;
    }
    .form-card input:focus,
    .form-card select:focus,
    .form-card textarea:focus{
        border-color:#ff4d94;
        box-shadow:0 0 8px rgba(255,77,148,.25);
        outline:none;
    }
    .image-preview{
        width:100%;
        max-height:180px;
        object-fit:contain;
        margin-top:10px;
        border-radius:12px;
        border:1px solid #ffcce6;
    }
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
    @media(max-width:800px){
        .form-card{grid-template-columns:1fr;}
        .form-card .full-width{grid-column:span 1;}
        .sidebar{width:60px; padding:20px 10px;}
        .sidebar h2{font-size:0;}
        .menu-item{font-size:0; padding:10px;}
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
        <h2 class="main-title">Edit Produk</h2>
        <a href="{{ route('backend.v1.products.index') }}" class="btn btn-back"><i class="fa-solid fa-arrow-left"></i> Kembali</a>

        <form class="form-card" method="POST" action="{{ route('backend.v1.products.update', $product->id) }}" enctype="multipart/form-data">
            @csrf

            <div class="full-width">
                <label><i class="fa-solid fa-image"></i> Gambar Produk</label>
                <input type="file" name="product_image" accept="image/*" onchange="previewImage(event)">
                @if($product->image)
                    <img id="imagePreview" src="{{ asset('storage/'.$product->image) }}" class="image-preview">
                @else
                    <img id="imagePreview" src="https://via.placeholder.com/180x180?text=No+Image" class="image-preview">
                @endif
            </div>

            <div>
                <label><i class="fa-solid fa-tag"></i> Nama Produk</label>
                <input type="text" name="name" value="{{ $product->name }}">
            </div>

            <div>
                <label><i class="fa-solid fa-list"></i> Kategori</label>
                <select name="categories_id" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->categories_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label><i class="fa-solid fa-hashtag"></i> Batch Number</label>
                <input type="text" name="batch_number" value="{{ $product->batch_number }}">
            </div>

            <div>
                <label><i class="fa-solid fa-calendar-check"></i> Tanggal Produksi</label>
                <input type="date" name="manufactured_at" value="{{ $product->manufactured_at }}">
            </div>

            <div>
                <label><i class="fa-solid fa-calendar-xmark"></i> Expired Date</label>
                <input type="date" name="expired_at" value="{{ $product->expired_at }}">
            </div>

            <div>
                <label><i class="fa-solid fa-boxes-stacked"></i> Stock</label>
                <input type="number" name="stock" value="{{ $product->stock }}">
            </div>

            <div>
                <label><i class="fa-solid fa-money-bill-wave"></i> Harga</label>
                <input type="number" step="0.01" name="price" value="{{ $product->price }}">
            </div>

            <div>
                <label><i class="fa-solid fa-circle-info"></i> Status</label>
                <select name="status">
                    <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="discontinued" {{ $product->status == 'discontinued' ? 'selected' : '' }}>Discontinued</option>
                </select>
            </div>

            <div class="full-width">
                <label><i class="fa-solid fa-heart"></i> Benefits</label>
                <textarea name="benefits">{{ $product->benefits }}</textarea>
            </div>

            <div class="full-width">
                <label><i class="fa-solid fa-flask"></i> Ingredients</label>
                <textarea name="ingredients">{{ $product->ingredients }}</textarea>
            </div>

            <div class="full-width">
                <label><i class="fa-solid fa-hand-sparkles"></i> How To Use</label>
                <textarea name="how_to_use">{{ $product->how_to_use }}</textarea>
            </div>

            <div class="full-width">
                <button type="submit" class="submit-btn"><i class="fa-solid fa-floppy-disk"></i> Update Produk</button>
            </div>

        </form>
    </div>
</div>

<script>
    function previewImage(event){
        const reader = new FileReader();
        reader.onload = function(){
            document.getElementById('imagePreview').src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

</body>
</html>