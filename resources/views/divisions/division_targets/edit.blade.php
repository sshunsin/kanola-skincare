@extends('layouts.app')

@section('content')
<div class="container">

<h4>Edit Target Divisi</h4>

<form method="POST"
      action="{{ route('backend.v1.analytics.targets.update',  $item->id) }}">
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
        <label>Target</label>
        <input type="number" name="target"
               value="{{ $item->target }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Realisasi</label>
        <input type="number" name="realisasi"
               value="{{ $item->realisasi }}"
               class="form-control">
    </div>

    <button class="btn btn-success">Update</button>
    <a href="{{ route('backend.v1.analytics.targets.index') }}"
       class="btn btn-secondary">Kembali</a>
</form>

</div>
@endsection