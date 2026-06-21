@extends('layouts.app')

@section('content')
<div class="container">

<div class="d-flex justify-content-between mb-3">
    <h4>Target Divisi</h4>
    <a href="{{ route('backend.v1.analytics.targets.create') }}"
       class="btn btn-primary">+ Tambah</a>
</div>

<div class="card mb-4">
    <div class="card-body">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Divisi</th>
                    <th>Periode</th>
                    <th>Target</th>
                    <th>Realisasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->nama_divisi }}</td>
                    <td>{{ $item->periode }}</td>
                    <td>{{ $item->target }}</td>
                    <td>{{ $item->realisasi }}</td>
                    <td>
                        <a href="{{ route('backend.v1.analytics.targets.edit', $item->id) }}"
                           class="btn btn-warning btn-sm">Edit</a>
                        <form method="POST"
                              action="{{ route('backend.v1.analytics.targets.destroy', $item->id) }}"
                              class="d-inline">
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
        <canvas id="targetChart"></canvas>
    </div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(document.getElementById('targetChart'), {
    type: 'bar',
    data: {
        labels: {!! json_encode($labels) !!},
        datasets: [
            {
                label: 'Target',
                data: {!! json_encode($target) !!}
            },
            {
                label: 'Realisasi',
                data: {!! json_encode($realisasi) !!}
            }
        ]
    }
});
</script>
@endsection