@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y fade-in">

    {{-- Judul --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-success mb-0">📊 Statistik Wisata & Pengunjung</h3>
        <small class="text-muted">Data lengkap 30 hari terakhir</small>
    </div>

    <div class="row g-4">
        {{-- Grafik Harga Tiket --}}
        <div class="col-lg-6 col-md-12">
            <div class="card shadow-lg border-0 rounded-4 h-100"
                style="background: linear-gradient(135deg, #d6ffcb, #9cecfb);">
                <div class="card-body">
                    <h5 class="card-title text-primary mb-3">
                        <i class="ti ti-chart-bar"></i> Grafik Harga Tiket per Wisata
                    </h5>
                    <canvas id="chartWisata" height="220"></canvas>
                </div>
            </div>
        </div>

        {{-- Grafik Pengunjung Harian --}}
        <div class="col-lg-6 col-md-12">
            <div class="card shadow-lg border-0 rounded-4 h-100"
                style="background: linear-gradient(135deg, #f6d365, #fda085);">
                <div class="card-body">
                    <h5 class="card-title text-primary mb-3">
                        <i class="ti ti-activity"></i> Grafik Pengunjung 30 Hari Terakhir
                    </h5>
                    <canvas id="chartPengunjung" height="220"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {

    // === GRAFIK HARGA TIKET ===
    const ctx1 = document.getElementById('chartWisata').getContext('2d');

    // Ambil data dari controller, fallback jika kosong
    @php
        $dataWisata = $wisatas->isNotEmpty() ? $wisatas : collect([
            ['nama' => 'Pantai Biru', 'harga_tiket' => 15000],
            ['nama' => 'Air Terjun Indah', 'harga_tiket' => 25000],
            ['nama' => 'Gunung Rindu', 'harga_tiket' => 50000],
            ['nama' => 'Hutan Pelangi', 'harga_tiket' => 18000],
        ]);
    @endphp

    const wisataData = @json($dataWisata);

    const labels1 = wisataData.map(w => w.nama);
    const harga = wisataData.map(w => w.harga_tiket);

    const warnaBar = [
        '#22c55e', '#16a34a', '#3b82f6', '#0ea5e9',
        '#eab308', '#facc15', '#fb923c', '#f97316',
    ];

    new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: labels1,
            datasets: [{
                label: 'Harga Tiket (Rp)',
                data: harga,
                backgroundColor: warnaBar.slice(0, labels1.length),
                borderColor: 'rgba(0,0,0,0.2)',
                borderWidth: 2,
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                title: {
                    display: true,
                    text: 'Harga Tiket Wisata',
                    color: '#1e293b',
                    font: { size: 14, weight: 'bold' }
                }
            },
            animation: {
                duration: 1200,
                easing: 'easeOutBounce'
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { color: '#1e293b', callback: v => 'Rp ' + v.toLocaleString('id-ID') },
                    grid: { color: 'rgba(0,0,0,0.05)' }
                },
                x: {
                    ticks: { color: '#1e293b' },
                    grid: { display: false }
                }
            }
        }
    });

    // === GRAFIK PENGUNJUNG ===
    const ctx2 = document.getElementById('chartPengunjung').getContext('2d');
    const tanggal = @json($tanggal);
    const jumlah = @json($pengunjung);

    const grad = ctx2.createLinearGradient(0, 0, 0, 300);
    grad.addColorStop(0, 'rgba(56, 189, 248, 0.6)');
    grad.addColorStop(0.5, 'rgba(132, 204, 22, 0.4)');
    grad.addColorStop(1, 'rgba(250, 204, 21, 0.3)');

    new Chart(ctx2, {
        type: 'line',
        data: {
            labels: tanggal,
            datasets: [{
                label: 'Jumlah Pengunjung',
                data: jumlah,
                fill: true,
                backgroundColor: grad,
                borderColor: '#0ea5e9',
                borderWidth: 3,
                tension: 0.4,
                pointBackgroundColor: jumlah.map(j =>
                    j > 130 ? '#facc15' : j > 100 ? '#22c55e' : '#3b82f6'
                ),
                pointRadius: 5,
                pointHoverRadius: 8
            }]
        },
        options: {
            plugins: {
                legend: { display: false },
                title: {
                    display: true,
                    text: 'Jumlah Pengunjung per Hari',
                    color: '#1e293b',
                    font: { size: 14, weight: 'bold' }
                }
            },
            animation: {
                duration: 1000,
                easing: 'easeOutQuart'
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { color: '#1e293b' },
                    grid: { color: 'rgba(0,0,0,0.08)' }
                },
                x: {
                    ticks: { color: '#1e293b' },
                    grid: { display: false }
                }
            }
        }
    });
});
</script>
@endsection
