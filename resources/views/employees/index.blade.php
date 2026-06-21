<!DOCTYPE html>
<html>
<head>
    <title>Daftar Karyawan - Dashboard</title>

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        *{ font-family:'Poppins',sans-serif; box-sizing:border-box; margin:0; padding:0; }
        body{     background: #ffc7eb;
    background: linear-gradient(168deg, rgba(255, 199, 235, 1) 0%, rgba(255, 171, 226, 1) 50%, rgba(255, 255, 255, 1) 100%);
        ; display:flex; min-height:100vh; }

        /* ===== SIDEBAR ===== */
        .sidebar{
            width:250px;
            background: #ff69b4;
            background: linear-gradient(169deg, rgba(255, 105, 180, 1) 52%, rgba(255, 255, 255, 1) 100%)
            color:white;
            display:flex;
            flex-direction:column;
            padding:30px 20px;
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
            box-shadow:0 4px 12px rgba(0,0,0,.12);
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
            margin-bottom:20px;
        }

        .btn{
            padding:8px 14px;
            border-radius:12px;
            text-decoration:none;
            font-size:13px;
            font-weight:600;
            margin-right:6px;
            display:inline-flex;
            align-items:center;
            gap:6px;
            transition:all .3s;
        }
        .btn-back{ background:#ffe1f1; color:#c2186b; }
        .btn-back:hover{ background:#ffcce0; }
        .btn-add{ background:linear-gradient(135deg,#ff4fa1,#ff85c2); color:white; }
        .btn-add:hover{ opacity:.85; }

        .filter-container{
            display:flex;
            flex-wrap:wrap;
            align-items:center;
            margin:15px 0;
            gap:12px;
        }
        .filter-container input[type="text"],
        .filter-container select{
            padding:8px 12px;
            border-radius:12px;
            border:1px solid #ffcce6;
            font-size:14px;
            outline:none;
            transition:border-color 0.3s;
        }
        .filter-container input[type="text"]:focus,
        .filter-container select:focus{
            border-color:#ff4d94;
            box-shadow:0 0 6px rgba(255,77,148,.25);
        }

        /* ===== TABLE ===== */
        table{
            width:100%;
            border-collapse:collapse;
            margin-top:15px;
            border-radius:12px;
            overflow:hidden;
            box-shadow:0 15px 35px rgba(0,0,0,.08);
            background:white;
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
        tr:nth-child(even) td{ background:#fff7fc; }

        .btn-action{
            font-size:12px;
            margin-right:4px;
            text-decoration:none;
            color:#d63384;
            font-weight:600;
        }
        button{
            background:linear-gradient(135deg,#ff6fa8,#ff8fc9);
            border:none;
            color:white;
            padding:5px 10px;
            border-radius:10px;
            cursor:pointer;
            font-size:12px;
            transition:all .3s;
        }
        button:hover{ opacity:.85; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 900px){
            body{ flex-direction:column; }
            .sidebar{
                width:100%;
                height:auto;
                padding:15px;
                flex-direction:row;
                overflow-x:auto;
                border-radius:0;
            }
            .sidebar h2{ display:none; }
            .sidebar a{ margin:0 10px; white-space:nowrap; }
            .main-content{ margin-left:0; padding:25px 18px; }
            .filter-container{ flex-direction:column; align-items:stretch; }
        }
    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>Menu</h2>
        <a href="{{ route('backend.v1.products.index') }}"><i class="fa-solid fa-box"></i> Produk</a>
        <a href="{{ route('backend.v1.divisions.index') }}"><i class="fa-solid fa-building"></i> Divisi</a>
        <a href="{{ route('backend.v1.employees.index') }}" class="active"><i class="fa-solid fa-users"></i> Karyawan</a>
        <a href="{{ route('backend.v1.attendances.index') }}"><i class="fa-solid fa-clock"></i> Absensi</a>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <h2 class="main-title">Data Karyawan 💗</h2>

        <a class="btn btn-back" href="/end/dashboard"><i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard</a>
        <a class="btn btn-add" href="{{ route('backend.v1.employees.create') }}"><i class="fa-solid fa-plus"></i> Tambah Karyawan</a>

        <!-- Filter & Search -->
        <div class="filter-container">
            <input type="text" placeholder="Cari nama karyawan..." id="searchInput" onkeyup="filterTable()">
            <select id="divisionFilter" onchange="filterTable()">
                <option value="">Semua Divisi</option>
                @foreach($divisions as $division)
                    <option value="{{ $division->name }}">{{ $division->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- TABLE -->
        <table id="employeesTable">
            <tr>
                <th>Nama User</th>
                <th>Divisi</th>
                <th>Kode</th>
                <th>Jabatan</th>
                <th>Telepon</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            @foreach($employees as $e)
            <tr>
                <td>{{ $e->name }}</td>
                <td>{{ $e->division->name }}</td>
                <td>{{ $e->employee_code }}</td>
                <td>{{ $e->position }}</td>
                <td>{{ $e->phone }}</td>
                <td>{{ $e->status }}</td>
                <td>
                    <a class="btn-action" 
                        href="{{ route('backend.v1.employees.edit', $e->id) }}" 
                        style="background: #ffe3f3; color: #d63384; border: 1px solid #ffd3ec; padding: 8px 10px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; text-decoration: none; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 10px rgba(0,0,0,0.03); margin-right: 5px;"
                        onmouseover="this.style.background='#d63384'; this.style.color='white'; this.style.borderColor='#d63384';" 
                        onmouseout="this.style.background='#ffe3f3'; this.style.color='#d63384'; this.style.borderColor='#ffd3ec';">
                            <i class="fa-solid fa-pen" style="font-size: 14px;"></i>
                    </a>
                    <form action="{{ route('backend.v1.employees.destroy', $e->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" 
                                onclick="return confirm('Hapus data karyawan ini?')" 
                                style="background: #ffe3f3; color: #d63384; border: 1px solid #ffd3ec; padding: 8px 10px; border-radius: 50%; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 10px rgba(0,0,0,0.03);"
                                onmouseover="this.style.background='#d63384'; this.style.color='white'; this.style.borderColor='#d63384';" 
                                onmouseout="this.style.background='#ffe3f3'; this.style.color='#d63384'; this.style.borderColor='#ffd3ec';">
                            <i class="fa-solid fa-trash" style="font-size: 14px;"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <script>
        function filterTable(){
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const divisionFilter = document.getElementById('divisionFilter').value.toLowerCase();
            const table = document.getElementById('employeesTable');
            const tr = table.getElementsByTagName('tr');

            for(let i=1; i<tr.length; i++){
                const tdName = tr[i].getElementsByTagName('td')[0];
                const tdDivision = tr[i].getElementsByTagName('td')[1];

                const matchName = tdName && tdName.textContent.toLowerCase().includes(searchInput);
                const matchDivision = tdDivision && (divisionFilter === "" || tdDivision.textContent.toLowerCase() === divisionFilter);

                tr[i].style.display = (matchName && matchDivision) ? "" : "none";
            }
        }
    </script>

</body>
</html>