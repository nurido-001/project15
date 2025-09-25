@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    {{-- Judul --}}
    <h3 class="fw-bold mb-4">Grafik & Data Wisata</h3>

    <div class="row g-4">
        {{-- Kolom Grafik --}}
        <div class="col-lg-6 col-md-12">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title mb-3">Grafik Harga Tiket</h5>
                    <canvas id="chartWisata" height="200"></canvas>
                </div>
            </div>
        </div>

        {{-- Kolom Tabel --}}
        <div class="col-lg-6 col-md-12">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title mb-3">Tabel Data Wisata</h5>
                    <div class="table-responsive" style="max-height: 350px; overflow-y:auto;">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Lokasi</th>
                                    <th>Harga</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($wisatas as $w)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $w->nama }}</td>
                                        <td>{{ $w->lokasi }}</td>
                                        <td>
                                            @if(isset($w->harga_tiket))
                                                Rp {{ number_format($w->harga_tiket, 0, ',', '.') }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if($w->foto)
                                                <img src="{{ asset('storage/' . $w->foto) }}" alt="{{ $w->nama }}" width="50" class="rounded">
                                            @else
                                                <img src="{{ asset('default/opo.jpg') }}" alt="Default Image" width="50" class="rounded">
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">Belum ada data wisata.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('chartWisata');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($wisatas->pluck('nama')),
            datasets: [{
                label: 'Harga Tiket',
                data: @json($wisatas->pluck('harga_tiket')),
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endsection
