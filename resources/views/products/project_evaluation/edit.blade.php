<!DOCTYPE html>
<html>
<head>
    <title>Products Complain</title>

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;800&display=swap" rel="stylesheet">

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
        transition:all .3s ease;
    }

    .btn-back{
        background:#ffe1f1;
        color:#c2186b;
        margin-bottom:15px;
    }

    .btn-back:hover{
        background:#ffcce0;
    }

    .form-card{
        background:white;
        padding:25px;
        border-radius:22px;
        box-shadow:0 15px 35px rgba(0,0,0,.08);
        display:grid;
        grid-template-columns:repeat(2,1fr);
        gap:20px;
    }

    .form-card.full-width{ grid-column: span 2; }

    .form-card label{
        display:block;
        margin-bottom:8px;
        font-weight:500;
        color:#d63384;
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

    .form-card textarea{
        min-height:100px;
        resize:vertical;
    }

    button.submit-btn{
        grid-column: span 2;
        background:linear-gradient(135deg,#ff4fa1,#ff85c2);
        color:white;
        font-weight:600;
        font-size:14px;
        border:none;
        border-radius:12px;
        padding:12px 0;
        cursor:pointer;
        transition: all 0.3s ease;
    }

    button.submit-btn:hover{
        background:linear-gradient(135deg,#ff85c2,#ff4fa1);
        transform:translateY(-2px);
        box-shadow:0 6px 18px rgba(255,79,161,.35);
    }

    @media(max-width:800px){
        .form-card{grid-template-columns:1fr;}
        .form-card.full-width{grid-column:span 1;}
        .sidebar{width:60px; padding:20px 10px;}
        .sidebar h2{font-size:0;}
        .menu-item{font-size:0; padding:10px;}
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
    <h2 class="main-title">Edit Products Complain</h2>
    <a class="btn btn-back" href="{{ route('backend.v1.projects.evaluation.index') }}"><i class="fa-solid fa-arrow-left"></i> Kembali</a>

    <div class="form-card">
        <form method="POST" action="{{ route('backend.v1.projects.evaluation.update',$projectEvaluation->id) }}">
            @csrf
            @method('PUT')

            <div class="full-width">
                <label>Kode Complain</label>
                <input type="text" name="code" value="{{ $projectEvaluation->code }}" readonly style="background-color: #f3f4f6; cursor: not-allowed; border-color: #ffd1e8;">
            </div>

            <div>
                <label><i class="fa-solid fa-chart-simple"></i> Skor</label>
                <input type="number" name="score" min="0" max="100" value="{{ $projectEvaluation->score }}">
            </div>

            <div>
                <label><i class="fa-solid fa-triangle-exclamation"></i> Risiko</label>
                <select name="risk_level">
                    <option value="low" {{ $projectEvaluation->risk_level=='low'?'selected':'' }}>Low</option>
                    <option value="medium" {{ $projectEvaluation->risk_level=='medium'?'selected':'' }}>Medium</option>
                    <option value="high" {{ $projectEvaluation->risk_level=='high'?'selected':'' }}>High</option>
                </select>
            </div>

            <div>
                <label><i class="fa-solid fa-star-half-stroke"></i> Kualitas</label>
                <select name="quality">
                    <option value="poor" {{ $projectEvaluation->quality=='poor'?'selected':'' }}>Poor</option>
                    <option value="fair" {{ $projectEvaluation->quality=='fair'?'selected':'' }}>Fair</option>
                    <option value="good" {{ $projectEvaluation->quality=='good'?'selected':'' }}>Good</option>
                    <option value="excellent" {{ $projectEvaluation->quality=='excellent'?'selected':'' }}>Excellent</option>
                </select>
            </div>

            <div>
                <label><i class="fa-solid fa-gavel"></i> Keputusan</label>
                <select name="decision">
                    <option value="continue" {{ $projectEvaluation->decision=='continue'?'selected':'' }}>Continue</option>
                    <option value="revision" {{ $projectEvaluation->decision=='revision'?'selected':'' }}>Revision</option>
                    <option value="hold" {{ $projectEvaluation->decision=='hold'?'selected':'' }}>Hold</option>
                    <option value="terminated" {{ $projectEvaluation->decision=='terminated'?'selected':'' }}>Terminated</option>
                </select>
            </div>

            <div>
                <label><i class="fa-solid fa-calendar-check"></i> Tanggal Complain</label>
                <input type="date" name="evaluation_date" value="{{ $projectEvaluation->evaluation_date }}">
            </div>

            <div class="full-width">
                <label><i class="fa-solid fa-note-sticky"></i> Catatan Manajer</label>
                <textarea name="manager_notes">{{ $projectEvaluation->manager_notes }}</textarea>
            </div>

            <div class="full-width">
                <button type="submit" class="submit-btn"><i class="fa-solid fa-floppy-disk"></i> Update Complain</button>
            </div>

        </form>
    </div>
</div>

</body>
</html>