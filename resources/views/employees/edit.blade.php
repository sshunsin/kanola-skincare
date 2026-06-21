<!DOCTYPE html>
<html>
<head>
    <title>Edit Karyawan - Dashboard</title>

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;800&display=swap" rel="stylesheet">

    <!-- FONT AWESOME ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        * { font-family: 'Poppins', sans-serif; box-sizing: border-box; }

        body {
            background: #ffc7eb;
            background: linear-gradient(168deg, rgba(255, 199, 235, 1) 0%, rgba(255, 171, 226, 1) 50%, rgba(255, 255, 255, 1) 100%);
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 220px;
            background: #ff69b4;
            background: linear-gradient(169deg, rgba(255, 105, 180, 1) 52%, rgba(255, 255, 255, 1) 100%)
            color: white;
            display: flex;
            flex-direction: column;
            padding: 30px 20px;
            height: 100vh;
        }

        .sidebar h2 {
            font-size: 22px;
            margin-bottom: 30px;
            font-weight: 800;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            margin: 12px 0;
            font-weight: 600;
            padding: 10px 14px;
            border-radius: 8px;
            transition: background 0.3s;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar a i{
            width: 20px;
            text-align: center;
        }

        .sidebar a:hover {
            background-color: #ff3399;
        }

        /* ===== MAIN CONTENT ===== */
        .main-content {
            flex: 1;
            padding: 30px 40px;
            overflow-y: auto;
        }

        h2.main-title {
            color:#d63384;
            font-weight:800;
            margin-bottom: 30px;
        }

        .form-card {
            background-color: #fff0f6;
            padding: 40px 50px;
            border-radius: 20px;
            max-width: 600px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #ff3399;
            font-weight: 600;
        }

        select, input[type="text"] {
            width: 100%;
            padding: 10px 12px;
            border-radius: 12px;
            border: 2px solid #ffcce6;
            margin-bottom: 20px;
            font-size: 14px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        select:focus, input[type="text"]:focus {
            outline: none;
            border-color: #ff3399;
            box-shadow: 0 0 10px rgba(255, 51, 153, 0.25);
        }

        button {
            background-color: #ff4d94;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s, transform 0.2s;
        }

        button:hover {
            background-color: #ff1a75;
            transform: translateY(-2px);
        }

        .btn-back {
            display: inline-block;
            background: #ffe6f3;
            color: #c2186b;
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 10px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        @media (max-width: 800px){
            body { flex-direction: column; }
            .sidebar {
                width: 100%;
                height: auto;
                padding: 20px;
                flex-direction: row;
                overflow-x: auto;
            }
            .sidebar h2 { display: none; }
            .sidebar a { margin: 0 10px; white-space: nowrap; }
            .main-content { padding: 20px; }
        }
    </style>
</head>

<body>

    <!-- ===== SIDEBAR ===== -->
    <div class="sidebar">
        <h2>Dashboard</h2>

        <a href="/dashboard">
            <i class="fa-solid fa-chart-line"></i> Dashboard
        </a>

        <a href="{{ route('backend.v1.products.index') }}">
            <i class="fa-solid fa-box"></i> Produk
        </a>

        <a href="{{ route('backend.v1.divisions.index') }}">
            <i class="fa-solid fa-building"></i> Divisi
        </a>

        <a href="{{ route('backend.v1.employees.index') }}">
            <i class="fa-solid fa-user-tie"></i> Karyawan
        </a>

        <a href="{{ route('backend.v1.attendances.index') }}">
            <i class="fa-solid fa-clock"></i> Absensi
        </a>
    </div>

    <!-- ===== MAIN CONTENT ===== -->
    <div class="main-content">
        <h2 class="main-title">Edit Karyawan 💗</h2>

        <a class="btn-back" href="{{ route('backend.v1.employees.index') }}">
            ⬅ Kembali ke Daftar Karyawan
        </a>

        <div class="form-card">
            <form method="POST" action="{{ route('backend.v1.employees.update',$employee->id) }}">
                @csrf
                @method('PUT')

                <!-- USER (TEXT INPUT) -->
                <label>User :</label>
                <input 
                    type="text" 
                    name="user_name" 
                    value="{{ $employee->name }}"
                    placeholder="Masukkan nama user">

                <!-- DIVISI -->
                <label>Divisi :</label>
                <select name="division_id">
                    @foreach($divisions as $d)
                        <option value="{{ $d->id }}" {{ $employee->division_id == $d->id ? 'selected' : '' }}>
                            {{ $d->name }}
                        </option>
                    @endforeach
                </select>

                <!-- KODE -->
                <label>Kode :</label>
                <input type="text" name="employee_code" value="{{ $employee->employee_code }}">

                <!-- JABATAN -->
                <label>Jabatan :</label>
                <input type="text" name="position" value="{{ $employee->position }}">

                <!-- TELEPON -->
                <label>Telepon :</label>
                <input type="text" name="phone" value="{{ $employee->phone }}">

                <!-- STATUS -->
                <label>Status :</label>
                <select name="status">
                    <option value="active" {{ $employee->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $employee->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>

                <button type="submit">Update</button>
            </form>
        </div>
    </div>

</body>
</html>