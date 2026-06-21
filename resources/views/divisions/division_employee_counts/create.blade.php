@extends('layouts.app')

@section('content')
<div class="container">

<h4>Tambah Jumlah Karyawan Divisi</h4>

<form method="POST"
      action="{{ route('backend.v1.analytics.employee-counts.store') }}">
    @csrf

    <div class="mb-3">
        <label>Nama Divisi</label>
        <input name="nama_divisi" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Jumlah Karyawan</label>
        <input type="number" name="jumlah_karyawan"
               class="form-control" min="0" required>
    </div>

    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('backend.v1.analytics.employee-counts.index') }}"
       class="btn btn-secondary">Kembali</a>
</form>

</div>
@endsection