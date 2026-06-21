@extends('layouts.app')

@section('content')
<div class="container">

<div class="d-flex justify-content-between mb-3">
    <h4>Jumlah Karyawan Divisi</h4>
    <a href="{{ route('backend.v1.analytics.employee-counts.create') }}"
       class="btn btn-primary">+ Tambah</a>
</div>

<div class="card mb-4">
    <div class="card-body">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Divisi</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->nama_divisi }}</td>
                    <td>{{ $item->jumlah_karyawan }}</td>
                    <td>
                        <a href="{{ route('backend.v1.analytics.employee-counts.edit',$item->id) }}"
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('backend.v1.analytics.employee-counts.destroy',$item->id) }}"
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus data?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <canvas id="employeeChart"></canvas>
    </div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(document.getElementById('employeeChart'), {
    type: 'bar',
    data: {
        labels: {!! json_encode($labels) !!},
        datasets: [{
            label: 'Jumlah Karyawan',
            data: {!! json_encode($values) !!}
        }]
    }
});
</script>
@endsection