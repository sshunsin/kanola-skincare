@extends('layouts.app')

@section('content')
<div class="container">

<h4>Edit Jumlah Karyawan Divisi</h4>

<form method="POST"
      action="{{ route('backend.v1.analytics.employee-counts.update',$item->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama Divisi</label>
        <input name="nama_divisi"
               value="{{ $item->nama_divisi }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Jumlah Karyawan</label>
        <input type="number" name="jumlah_karyawan"
               value="{{ $item->jumlah_karyawan }}"
               class="form-control">
    </div>

    <button class="btn btn-success">Update</button>
    <a href="{{ route('backend.v1.analytics.employee-counts.index') }}"
       class="btn btn-secondary">Kembali</a>
</form>

</div>
@endsection