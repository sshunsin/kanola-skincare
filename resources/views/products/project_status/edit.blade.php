<!DOCTYPE html>
<html>
<head>
    <title>Status Products</title>

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
    }

    /* ===== FORM ===== */
    .form-card{
        background:white;
        padding:30px;
        border-radius:20px;
        box-shadow:0 15px 35px rgba(0,0,0,.08);
        max-width:620px;
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
        border:1px solid #ffd3ec;
        margin-bottom:18px;
        outline:none;
    }

.custom-select-wrapper {
    position: relative;
    width: 100%;
    user-select: none;
}

.custom-select-trigger {
    background: #ffe0f0;
    color: #c2186b;
    padding: 10px 16px;
    margin-bottom: 18px;
    border-radius: 14px;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.custom-options {
    position: absolute;
    display: none;
    top: 100%;
    left: 0;
    right: 0;
    background: #fff;
    border: 1px solid #ffe6f3;
    border-radius: 14px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    z-index: 999;
    margin-top: 5px;
    padding: 0;
    list-style: none;
    max-height: 220px;
    overflow-y: auto;
}

.custom-options.open {
    display: block;
}

.custom-option {
    padding: 10px 16px;
    cursor: pointer;
    font-size: 13px;
    color: #333;
    transition: all 0.2s;
}

.custom-option:hover {
    background: #fff7fc;
    color: #d63384;
}

.custom-option.selected {
    background: #ffe0f0;
    color: #c2186b;
    font-weight: 700;
}

    textarea{
        resize:none;
        min-height:90px;
    }

    .btn-submit{
        background:linear-gradient(135deg,#ff4fa1,#ff85c2);
        border:none;
        color:white;
        padding:11px 22px;
        border-radius:14px;
        font-weight:600;
        cursor:pointer;
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
</aside>

<!-- ===== MAIN ===== -->
<main class="main-content">

    <h2 class="main-title">Edit Status Product ✏️</h2>

    <a class="btn btn-back" href="{{ route('backend.v1.projects.status.index') }}">
        <i class="fa-solid fa-arrow-left"></i> Kembali
    </a>

    <br><br>

    <div class="form-card">
        <form method="POST" action="{{ route('backend.v1.projects.status.update', $status->id) }}">
            @csrf
            @method('PUT')

            <div class="input-group">
                <label>Kode Product</label>
                <div class="input-wrapper">
                    <input type="text" name="code" value="{{ $status->code }}" readonly style="background-color: #f3f4f6; cursor: not-allowed;">
                </div>
            </div>

            <div class="custom-select-wrapper">
                <label>Status</label>
                <div class="custom-select-trigger" onclick="toggleDropdown()">
                    <span id="selected-text">{{ $status->name ?? 'Pilih Status' }}</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                
                <ul class="custom-options">
                    @foreach([
                        'Coming Soon', 'Clinical Trial', 'Testing', 'Active', 
                        'Out of Stock', 'Archived', 'Discontinued', 'Reformulated', 
                        'Low Stock', 'Limited Edition', 'Pending BPOM', 'Seasonal', 'Rebranding'
                    ] as $sName)
                        <li class="custom-option {{ $status->name == $sName ? 'selected' : '' }}" 
                            onclick="selectOption('{{ $sName }}')">
                            {{ $sName }}
                        </li>
                    @endforeach
                </ul>

                <input type="hidden" name="name" id="status-hidden-input" value="{{ $status->name }}">
            </div>

            <label>Deskripsi</label>
            <textarea name="description">{{ $status->description }}</textarea>

            <button class="btn-submit" type="submit">
                <i class="fa-solid fa-floppy-disk"></i> Update
            </button>
        </form>
    </div>

    <script>
        function toggleDropdown() {
            document.querySelector('.custom-options').classList.toggle('open');
        }

        function selectOption(value) {
            document.getElementById('selected-text').textContent = value;
            document.getElementById('status-hidden-input').value = value;
            document.querySelectorAll('.custom-option').forEach(opt => {
                opt.classList.remove('selected');
                if(opt.textContent.trim() === value) {
                    opt.classList.add('selected');
                }
            });
            document.querySelector('.custom-options').classList.remove('open');
        }

        window.addEventListener('click', function(e) {
            const selectWrapper = document.querySelector('.custom-select-wrapper');
            if (!selectWrapper.contains(e.target)) {
                document.querySelector('.custom-options').classList.remove('open');
            }
        });
    </script>

</main>

</body>
</html>