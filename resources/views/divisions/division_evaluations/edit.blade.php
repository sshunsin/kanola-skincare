@extends('layouts.app')

@section('content')
<div class="container">

<h4>Edit Evaluasi Divisi</h4>

<form method="POST"
      action="{{ route('backend.v1.analytics.evaluations.update',$item->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama Divisi</label>
        <input name="nama_divisi"
               value="{{ $item->nama_divisi }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Periode</label>
        <input name="periode"
               value="{{ $item->periode }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Kedisiplinan</label>
        <input type="number" name="kedisiplinan"
               value="{{ $item->kedisiplinan }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Kerjasama</label>
        <input type="number" name="kerjasama"
               value="{{ $item->kerjasama }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Produktivitas</label>
        <input type="number" name="produktivitas"
               value="{{ $item->produktivitas }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Kualitas</label>
        <input type="number" name="kualitas"
               value="{{ $item->kualitas }}"
               class="form-control">
    </div>

    <button class="btn btn-success">Update</button>
    <a href="{{ route('backend.v1.analytics.evaluations.index') }}"
       class="btn btn-secondary">Kembali</a>
</form>

</div>
@endsection