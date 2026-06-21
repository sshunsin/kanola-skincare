@extends('layouts.app')

@section('content')
<div class="container">

<h4>Tambah Evaluasi Divisi</h4>

<form method="POST"
      action="{{ route('backend.v1.analytics.evaluations.store') }}">
    @csrf

    <div class="mb-3">
        <label>Nama Divisi</label>
        <input name="nama_divisi" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Periode</label>
        <input name="periode" class="form-control" placeholder="2026" required>
    </div>

    <div class="mb-3">
        <label>Kedisiplinan</label>
        <input type="number" name="kedisiplinan"
               class="form-control" min="0" max="100" required>
    </div>

    <div class="mb-3">
        <label>Kerjasama</label>
        <input type="number" name="kerjasama"
               class="form-control" min="0" max="100" required>
    </div>

    <div class="mb-3">
        <label>Produktivitas</label>
        <input type="number" name="produktivitas"
               class="form-control" min="0" max="100" required>
    </div>

    <div class="mb-3">
        <label>Kualitas</label>
        <input type="number" name="kualitas"
               class="form-control" min="0" max="100" required>
    </div>

    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('backend.v1.analytics.evaluations.index') }}"
       class="btn btn-secondary">Kembali</a>
</form>

</div>
@endsection