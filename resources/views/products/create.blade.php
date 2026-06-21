<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk - Dashboard</title>
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
        opacity:.85;
        box-shadow:0 2px 8px rgba(0,0,0,0.1);
        transition:all .3s ease;
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
        position:relative;
    }
    .main-title{
        font-size:26px;
        font-weight:800;
        color:#d63384;
        margin-bottom:25px;
    }
    .btn-back{
        display:inline-flex;
        align-items:center;
        gap:6px;
        background:#ffe1f1;
        color:#c2186b;
        padding:9px 16px;
        border-radius:14px;
        text-decoration:none;
        font-weight:600;
        margin-bottom:25px;
    }
    .card{
        background:white;
        padding:30px;
        border-radius:22px;
        box-shadow:0 15px 35px rgba(0,0,0,.08);
        max-width:800px;
    }
    label{
        font-weight:600;
        color:#c2186b;
        display:block;
        margin-bottom:6px;
        margin-top:18px;
    }
    .input-group{
        position:relative;
    }
    .input-group i{
        position:absolute;
        top:50%;
        left:14px;
        transform:translateY(-50%);
        color:#ff5fa2;
    }
    input, select, textarea{
        width:100%;
        padding:12px 14px 12px 42px;
        border-radius:14px;
        border:1px solid #ffd3ec;
        outline:none;
        font-size:14px;
    }
    textarea{
        resize:none;
        height:100px;
    }
    button{
        margin-top:25px;
        background:linear-gradient(135deg,#ff4fa1,#ff85c2);
        color:white;
        border:none;
        padding:12px 22px;
        border-radius:16px;
        font-weight:700;
        cursor:pointer;
        box-shadow:0 6px 18px rgba(255,79,161,.35);
        display:inline-flex;
        align-items:center;
        gap:6px;
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
    <h2 class="main-title">Tambah Produk Skincare 💗</h2>
    <a href="{{ route('backend.v1.products.index') }}" class="btn-back">
        <i class="fa-solid fa-arrow-left"></i> Kembali
    </a>

    <div class="card">
        <form method="POST" action="{{ route('backend.v1.products.store') }}" enctype="multipart/form-data">
            @csrf

            <label>Gambar Produk</label>
            <div class="input-group">
                <i class="fa-solid fa-image"></i>
                <input type="file" name="product_image" id="product_image" accept="image/*">
            </div>
            
            <div id="imagePreviewBox" style="display: none; margin-top: 10px; margin-bottom: 15px; padding-left: 5px;">
                <p style="font-size: 12px; color: #666; margin-bottom: 5px;">Pratinjau Gambar:</p>
                <img id="imageRenderPreview" src="#" alt="Preview" style="width: 120px; height: 120px; object-fit: cover; border-radius: 8px; border: 1px solid #ddd; display: block;">
            </div>

            <label>Nama Produk</label>
            <div class="input-group">
                <i class="fa-solid fa-tag"></i>
                <input type="text" name="name" required>
            </div>

            <label>Kategori</label>
            <div class="input-group">
                <i class="fa-solid fa-list"></i>
                <select name="categories_id" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>

            <label>Batch Number</label>
            <div class="input-group">
                <i class="fa-solid fa-barcode"></i>
                <input type="text" name="batch_number" required>
            </div>

            <label>Tanggal Produksi</label>
            <div class="input-group">
                <i class="fa-solid fa-calendar-days"></i>
                <input type="date" name="manufactured_at" required>
            </div>

            <label>Expired Date</label>
            <div class="input-group">
                <i class="fa-solid fa-calendar-xmark"></i>
                <input type="date" name="expired_at" required>
            </div>

            <label>Stock</label>
            <div class="input-group">
                <i class="fa-solid fa-boxes-stacked"></i>
                <input type="number" name="stock" required>
            </div>

            <label>Harga</label>
            <div class="input-group">
                <i class="fa-solid fa-money-bill-wave"></i>
                <input type="number" step="0.01" name="price" required>
            </div>

            <label>Status</label>
            <div class="input-group">
                <i class="fa-solid fa-toggle-on"></i>
                <select name="status" required>
                    <option value="active">Active</option>
                    <option value="discontinued">Discontinued</option>
                </select>
            </div>

            <label>Benefits</label>
            <div class="input-group">
                <i class="fa-solid fa-heart"></i>
                <textarea name="benefits" placeholder="Manfaat produk..."></textarea>
            </div>

            <label>Ingredients</label>
            <div class="input-group">
                <i class="fa-solid fa-flask"></i>
                <textarea name="ingredients" placeholder="Kandungan utama..."></textarea>
            </div>

            <label>How To Use</label>
            <div class="input-group">
                <i class="fa-solid fa-hand-sparkles"></i>
                <textarea name="how_to_use" placeholder="Cara penggunaan..."></textarea>
            </div>

            <button type="submit">
                <i class="fa-solid fa-save"></i> Simpan Produk
            </button>
        </form>
    </div>
</div>

<script>
    document.getElementById('product_image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const imgRender = document.getElementById('imageRenderPreview');
                const box = document.getElementById('imagePreviewBox');
                imgRender.src = event.target.result;
                box.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
</script>

</body>
</html>