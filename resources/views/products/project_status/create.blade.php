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
        margin-bottom: 20px;
    }

    .btn-back:hover{
        background:#ffcce0;
    }

    /* ===== FORM CARD ===== */
    .form-card{
        background:white;
        padding:30px;
        border-radius:22px;
        box-shadow:0 15px 35px rgba(0,0,0,.08);
        max-width:620px;
        width:100%;
    }

    label{
        font-weight:600;
        color:#d63384;
        margin-bottom:8px;
        display:block;
        font-size:14px;
    }

    input, select, textarea{
        width:100%;
        padding:12px 14px;
        border-radius:14px;
        border:1px solid #ffd3ec;
        margin-bottom:20px;
        outline:none;
        font-size:14px;
        transition: border-color 0.3s, box-shadow 0.3s, background 0.3s;
        background-color: white;
    }

    input:focus, select:focus, textarea:focus{
        border-color:#ff4d94;
        box-shadow:0 0 8px rgba(255,77,148,.25);
    }

    select option {
        background-color: white !important;
        color: #333 !important;
    }

    .custom-select-wrapper {
        position: relative;
        width: 100%;
        user-select: none;
        margin-bottom: 15px;
    }

    .custom-select-trigger {
        background: #ffe0f0;
        color: #c2186b;
        padding: 10px 16px;
        border-radius: 14px;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: 1px solid transparent;
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
        min-height:110px;
    }

    .btn-submit{
        background:linear-gradient(135deg,#ff4fa1,#ff85c2);
        border:none;
        color:white;
        padding:12px 24px;
        border-radius:14px;
        font-weight:600;
        font-size:14px;
        cursor:pointer;
        display:inline-flex;
        align-items:center;
        gap:8px;
        transition: all 0.3s ease;
        width: 100%;
        justify-content: center;
    }

    .btn-submit:hover{
        background:linear-gradient(135deg,#ff85c2,#ff4fa1);
        transform:translateY(-2px);
        box-shadow:0 6px 18px rgba(255,79,161,.35);
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

    <h2 class="main-title">Tambah Status Proyek ➕</h2>

    <div style="margin-bottom:15px;">
        <a class="btn btn-back" href="{{ route('backend.v1.projects.status.index') }}">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="form-card">
        <form method="POST" action="{{ route('backend.v1.projects.status.store') }}">
            @csrf

            <label>Kode Status</label>
            <input type="text" name="code" placeholder="Misal: FW (Singkatan Kode Product)-KNL (Singkatan Nama Product)-001" required autocomplete="off">

            <label>Status</label>
            <div class="custom-select-wrapper">
                <div class="custom-select-trigger" onclick="toggleDropdown()">
                    <span id="selected-text">-- Pilih Status --</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                
                <ul class="custom-options">
                    @foreach([
                        'Coming Soon', 'Clinical Trial', 'Testing', 'Active', 
                        'Out of Stock', 'Archived', 'Discontinued', 'Reformulated', 
                        'Low Stock', 'Limited Edition', 'Pending BPOM', 'Seasonal', 'Rebranding'
                    ] as $sName)
                        <li class="custom-option" onclick="selectOption('{{ $sName }}')">
                            {{ $sName }}
                        </li>
                    @endforeach
                </ul>

                <input type="hidden" name="name" id="status-hidden-input" value="" required>
            </div>

            <label>Deskripsi</label>
            <textarea name="description" placeholder="Deskripsi mengenai status tahapan batch proyek..."></textarea>

            <button class="btn-submit" type="submit">
                <i class="fa-solid fa-floppy-disk"></i> Simpan Status
            </button>
        </form>
    </div>

</div>
    
<script>
    const statusColors={
        "Coming Soon":"linear-gradient(135deg,#9c27b0,#ba68c8)",
        "Clinical Trial":"linear-gradient(135deg,#2196f3,#64b5f6)",
        "Testing":"linear-gradient(135deg,#ff9800,#ffb74d)",
        "Active":"linear-gradient(135deg,#4caf50,#81c784)",
        "Out of Stock":"linear-gradient(135deg,#ff5c8a,#ff8fab)",
        "Archived":"linear-gradient(135deg,#9e9e9e,#bdbdbd)",
        "Discontinued":"linear-gradient(135deg,#f44336,#e57373)"
    };

    function updateColor(el){
        if (el.value && statusColors[el.value]) {
            el.style.background = statusColors[el.value];
            el.style.color = "#fff";
        } else {
            el.style.background = "#fff";
            el.style.color = "#333";
        }
    }

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
        if (selectWrapper && !selectWrapper.contains(e.target)) {
            const optionsList = document.querySelector('.custom-options');
            if (optionsList) optionsList.classList.remove('open');
        }
    });
</script>

</body>
</html>