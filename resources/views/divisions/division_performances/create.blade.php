@extends('layouts.app')

@section('content')
<div class="container">

<h4>Tambah Kinerja Divisi</h4>

<form method="POST"
      action="{{ route('backend.v1.analytics.performances.store') }}">
    @csrf

    <div class="mb-3">
        <label>Nama Divisi</label>
        <input name="nama_divisi" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Periode</label>
        <input name="periode" class="form-control" placeholder="Jan 2026" required>
    </div>

    <div class="mb-3">
        <label>Nilai Kinerja (0-100)</label>
        <input type="number" name="nilai_kinerja"
               class="form-control" min="0" max="100" required>
    </div>

    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('backend.v1.analytics.performances.index') }}"
       class="btn btn-secondary">Kembali</a>
</form>

</div>
@endsection