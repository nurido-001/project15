@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Grafik Pengguna</h4>

    <div class="card">
        <div class="card-body">
            <p class="mb-4">Halaman ini menampilkan grafik pengguna.</p>

            {{-- Tempat grafik --}}
            <canvas id="userChart" height="120"></canvas>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {{-- Chart.js CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('userChart').getContext('2d');
        const userChart = new Chart(ctx, {
            type: 'line', // bisa diganti: 'bar', 'pie', dll
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [{
                    label: 'Jumlah Pengguna',
                    data: [12, 19, 8, 15, 22, 30], // contoh data dummy
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2,
                    tension: 0.4, // bikin garis agak melengkung
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    title: {
                        display: true,
                        text: 'Statistik Pengguna per Bulan'
                    }
                }
            }
        });
    </script>
@endpush
