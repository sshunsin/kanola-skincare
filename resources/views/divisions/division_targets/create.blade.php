@extends('layouts.app')

@section('content')
<div class="container">

<h4>Tambah Target Divisi</h4>

<form method="POST"
      action="{{ route('backend.v1.analytics.targets.store') }}">
    @csrf

    <div class="mb-3">
        <label>Nama Divisi</label>
        <input name="nama_divisi" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Periode</label>
        <input name="periode" class="form-control" placeholder="Q1 2026" required>
    </div>

    <div class="mb-3">
        <label>Target</label>
        <input type="number" name="target"
               class="form-control" min="0" required>
    </div>

    <div class="mb-3">
        <label>Realisasi</label>
        <input type="number" name="realisasi"
               class="form-control" min="0" required>
    </div>

    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('backend.v1.analytics.targets.index') }}"
       class="btn btn-secondary">Kembali</a>
</form>

</div>
@endsection