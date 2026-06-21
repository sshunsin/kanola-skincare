@extends('layouts.app')

@section('content')
<div class="container">

<div class="d-flex justify-content-between mb-3">
    <h4>Evaluasi Divisi</h4>
    <a href="{{ route('backend.v1.analytics.evaluations.create') }}"
       class="btn btn-primary">+ Tambah</a>
</div>

<div class="card mb-4">
    <div class="card-body">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Divisi</th>
                    <th>Periode</th>
                    <th>Rata-rata</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->nama_divisi }}</td>
                    <td>{{ $item->periode }}</td>
                    <td>
                        {{
                          ($item->kedisiplinan +
                           $item->kerjasama +
                           $item->produktivitas +
                           $item->kualitas) / 4
                        }}
                    </td>
                    <td>
                        <a href="{{ route('backend.v1.analytics.evaluations.edit',$item->id) }}"
                           class="btn btn-warning btn-sm">Edit</a>
                        <form method="POST"
                              action="{{ route('backend.v1.analytics.evaluations.destroy',$item->id) }}"
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
        <canvas id="evaluationChart"></canvas>
    </div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(document.getElementById('evaluationChart'), {
    type: 'radar',
    data: {
        labels: {!! json_encode($chartLabels) !!},
        datasets: [{
            label: 'Evaluasi Terakhir',
            data: {!! json_encode($chartData) !!}
        }]
    }
});
</script>
@endsection