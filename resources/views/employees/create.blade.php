<!DOCTYPE html>
<html>
<head>
    <title>Tambah Karyawan - Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        *{ font-family:'Poppins',sans-serif; box-sizing:border-box; margin:0; padding:0; }
        body{     background: #ffc7eb;
    background: linear-gradient(168deg, rgba(255, 199, 235, 1) 0%, rgba(255, 171, 226, 1) 50%, rgba(255, 255, 255, 1) 100%);
); display:flex; min-height:100vh; }

        /* ===== SIDEBAR ===== */
        .sidebar{
            width:250px;
            background: #ff69b4;
            background: linear-gradient(169deg, rgba(255, 105, 180, 1) 52%, rgba(255, 255, 255, 1) 100%);
            color:white;
            display:flex;
            flex-direction:column;
            padding:30px 22px;
            box-shadow: 8px 0 25px rgba(255,77,148,.35);
            position:fixed;
            top:0; bottom:0; left:0;
            border-top-right-radius:30px;
            border-bottom-right-radius:30px;
        }
        .sidebar h2{
            font-size:22px;
            font-weight:800;
            margin-bottom:35px;
            letter-spacing:1px;
        }
        .sidebar a{
            color:white;
            text-decoration:none;
            margin:8px 0;
            font-weight:500;
            padding:12px 16px;
            border-radius:12px;
            transition:all .3s;
            display:flex;
            align-items:center;
            gap:10px;
        }
        .sidebar a.active, .sidebar a:hover{ background: rgba(255,255,255,.25); }

        /* ===== MAIN CONTENT ===== */
        .main-content{
            flex:1;
            margin-left:250px;
            padding:40px 50px;
            overflow-y:auto;
        }
        h2.main-title{
            color:#d63384;
            font-weight:800;
            margin-bottom:25px;
        }

        .btn-back{
            display:inline-flex;
            align-items:center;
            gap:6px;
            background:#ffe1f1;
            color:#c2186b;
            text-decoration:none;
            padding:8px 14px;
            border-radius:12px;
            font-weight:600;
            margin-bottom:20px;
            transition:all .3s;
        }
        .btn-back:hover{ background:#ffcce0; }

        .form-card{
            background:white;
            padding:30px 40px;
            border-radius:20px;
            max-width:800px;
            box-shadow:0 12px 30px rgba(0,0,0,0.08);
        }

        .form-grid{
            display:grid;
            grid-template-columns: repeat(2, 1fr);
            gap:20px;
        }

        label{
            display:block;
            margin-bottom:6px;
            color:#c2186b;
            font-weight:600;
        }

        input[type="text"], input[type="email"], input[type="file"], select{
            width:100%;
            padding:12px 14px;
            border-radius:14px;
            border:1px solid #ffd3ec;
            margin-bottom:18px;
            font-size:14px;
            outline:none;
            transition:border-color 0.3s, box-shadow 0.3s;
        }
        input:focus, select:focus{
            border-color:#ff4d94;
            box-shadow:0 0 10px rgba(255,77,148,.2);
        }

        .img-preview{
            display:block;
            width:120px;
            height:120px;
            border-radius:50%;
            object-fit:cover;
            margin-bottom:20px;
            border:2px solid #ffd3ec;
            grid-column: span 2;
        }

        button{
            background:linear-gradient(135deg,#ff4fa1,#ff85c2);
            color:white;
            border:none;
            padding:12px;
            border-radius:14px;
            font-weight:600;
            font-size:15px;
            cursor:pointer;
            width:100%;
            grid-column: span 2;
            transition:all .3s;
        }
        button:hover{ opacity:.85; transform:translateY(-2px); }

        /* Notification */
        .notification{
            position: fixed;
            top:20px;
            right:20px;
            background:#ff4d94;
            color:white;
            padding:15px 20px;
            border-radius:12px;
            box-shadow:0 6px 15px rgba(0,0,0,0.2);
            opacity:0;
            pointer-events:none;
            transition: opacity 0.5s;
            z-index:1000;
        }
        .notification.show{
            opacity:1;
            pointer-events:auto;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width:800px){
            body{ flex-direction:column; }
            .sidebar{ width:100%; height:auto; padding:15px; flex-direction:row; overflow-x:auto; border-radius:0; }
            .sidebar h2{ display:none; }
            .sidebar a{ margin:0 10px; white-space:nowrap; }
            .main-content{ margin-left:0; padding:25px 18px; }
            .form-grid{ grid-template-columns:1fr; }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Dashboard</h2>
        <a href="{{ route('backend.v1.products.index') }}"><i class="fa-solid fa-box"></i> Produk</a>
        <a href="{{ route('backend.v1.divisions.index') }}"><i class="fa-solid fa-building"></i> Divisi</a>
        <a href="{{ route('backend.v1.employees.index') }}" class="active"><i class="fa-solid fa-users"></i> Karyawan</a>
        <a href="#"><i class="fa-solid fa-clock"></i> Absensi</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h2 class="main-title">Tambah Karyawan 💗</h2>

        <a class="btn-back" href="{{ route('backend.v1.employees.index') }}"><i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Karyawan</a>

        <div class="form-card">
            <form method="POST" action="{{ route('backend.v1.employees.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-grid">
                    <div>
                        <label>User :</label>
                        <input type="text" name="user_name" required>
                    </div>

                    <div>
                        <label>Email :</label>
                        <input type="email" name="email" placeholder="email@domain.com" required>
                    </div>

                    <div>
                        <label>Divisi :</label>
                        <select name="division_id" required>
                            @foreach($divisions as $d)
                                <option value="{{ $d->id }}">{{ $d->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label>Kode :</label>
                        <input type="text" name="employee_code" required>
                    </div>

                    <div>
                        <label>Jabatan :</label>
                        <input type="text" name="position" required>
                    </div>

                    <div>
                        <label>Telepon :</label>
                        <input type="text" name="phone" required>
                    </div>

                    <div>
                        <label>Status :</label>
                        <select name="status" required>
                            <option value="active">Aktif</option>
                            <option value="inactive">Nonaktif</option>
                        </select>
                    </div>

                    {{-- <div>
                        <label>Foto Profil :</label>
                        <input type="file" name="profile_image" accept="image/*" onchange="previewImage(event)">
                    </div> --}}

                    {{-- <img id="imgPreview" class="img-preview" src="#" alt="Preview Gambar" style="display:none;"> --}}

                    <button type="submit"><i class="fa-solid fa-plus"></i> Tambah Karyawan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Notification -->
    <div id="notification" class="notification">
        Data karyawan berhasil ditambah!
    </div>

    <script>
        // Preview Image
        function previewImage(event){
            const input = event.target;
            const preview = document.getElementById('imgPreview');
            if(input.files && input.files[0]){
                const reader = new FileReader();
                reader.onload = function(e){
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        }

        // Notification
        @if(session('success'))
            const notif = document.getElementById('notification');
            notif.classList.add('show');
            setTimeout(()=>{ notif.classList.remove('show'); }, 3000);
        @endif
    </script>

</body>
</html>