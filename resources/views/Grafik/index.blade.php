@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    {{-- Judul Halaman --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-success mb-0">📊 Statistik Wisata & Pengunjung</h3>
        <small class="text-muted">Data lengkap 30 hari terakhir</small>
    </div>

    <div class="row g-4">
        {{-- Grafik Harga Tiket --}}
        <div class="col-lg-6 col-md-12">
            <div class="card shadow-lg border-0 rounded-4 h-100">
                <div class="card-body">
                    <h5 class="card-title text-primary mb-3">
                        <i class="ti ti-chart-bar"></i> Grafik Harga Tiket per Wisata
                    </h5>
                    <canvas id="chartWisata" height="220"></canvas>
                    <p class="text-muted small mt-3">
                        <span class="badge bg-success">Murah</span> |
                        <span class="badge bg-warning">Sedang</span> |
                        <span class="badge bg-danger">Mahal</span>
                    </p>
                </div>
            </div>
        </div>

        {{-- Grafik Pengunjung Harian --}}
        <div class="col-lg-6 col-md-12">
            <div class="card shadow-lg border-0 rounded-4 h-100">
                <div class="card-body">
                    <h5 class="card-title text-primary mb-3">
                        <i class="ti ti-activity"></i> Grafik Pengunjung 30 Hari Terakhir
                    </h5>
                    <canvas id="chartPengunjung" height="220"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Data Wisata --}}
    <div class="card shadow-lg border-0 rounded-4 mt-4">
        <div class="card-body">
            <h5 class="card-title text-primary mb-3">
                <i class="ti ti-map-pin"></i> Data Wisata Terkini
            </h5>
            <div class="table-responsive" style="max-height: 350px; overflow-y:auto;">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Lokasi</th>
                            <th>Harga Tiket</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            // Simulasi data wisata jika belum ada dari database
                            $sampleWisata = [
                                ['nama' => 'Pantai Biru', 'lokasi' => 'Bali', 'harga_tiket' => 15000],
                                ['nama' => 'Air Terjun Indah', 'lokasi' => 'Malang', 'harga_tiket' => 25000],
                                ['nama' => 'Gunung Rindu', 'lokasi' => 'Bandung', 'harga_tiket' => 50000],
                                ['nama' => 'Hutan Pinus Asri', 'lokasi' => 'Yogyakarta', 'harga_tiket' => 10000],
                                ['nama' => 'Danau Tenang', 'lokasi' => 'Sumatera Utara', 'harga_tiket' => 30000],
                            ];
                        @endphp

                        @forelse ($wisatas ?? $sampleWisata as $w)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $w['nama'] ?? $w->nama }}</td>
                                <td>{{ $w['lokasi'] ?? $w->lokasi }}</td>
                                <td class="text-end fw-semibold text-success">
                                    Rp {{ number_format($w['harga_tiket'] ?? $w->harga_tiket, 0, ',', '.') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Belum ada data wisata.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // --- GRAFIK HARGA TIKET ---
    const ctx1 = document.getElementById('chartWisata').getContext('2d');
    const wisataData = @json($wisatas ?? [
        ['nama' => 'Pantai Biru', 'harga_tiket' => 15000],
        ['nama' => 'Air Terjun Indah', 'harga_tiket' => 25000],
        ['nama' => 'Gunung Rindu', 'harga_tiket' => 50000],
        ['nama' => 'Hutan Pinus Asri', 'harga_tiket' => 10000],
        ['nama' => 'Danau Tenang', 'harga_tiket' => 30000],
    ]);

    const labels1 = wisataData.map(w => w.nama);
    const harga = wisataData.map(w => w.harga_tiket);

    const warnaBar = harga.map(h => {
        if (h <= 15000) return 'rgba(75, 192, 192, 0.8)';
        if (h <= 30000) return 'rgba(255, 205, 86, 0.8)';
        return 'rgba(255, 99, 132, 0.8)';
    });

    new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: labels1,
            datasets: [{
                label: 'Harga Tiket (Rp)',
                data: harga,
                backgroundColor: warnaBar,
                borderWidth: 1,
                borderRadius: 6
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: v => 'Rp ' + v.toLocaleString('id-ID')
                    }
                }
            }
        }
    });

    // --- GRAFIK PENGUNJUNG PER HARI (30 hari terakhir) ---
    const ctx2 = document.getElementById('chartPengunjung').getContext('2d');

    // Buat data simulasi 30 hari
    const today = new Date();
    const tanggal = [];
    const jumlah = [];

    for (let i = 29; i >= 0; i--) {
        const tgl = new Date(today);
        tgl.setDate(today.getDate() - i);
        tanggal.push(tgl.toLocaleDateString('id-ID', { day: '2-digit', month: 'short' }));
        jumlah.push(Math.floor(Math.random() * 80) + 20); // random 20–100
    }

    const gradient = ctx2.createLinearGradient(0, 0, 0, 300);
    gradient.addColorStop(0, 'rgba(54, 162, 235, 0.5)');
    gradient.addColorStop(1, 'rgba(255, 255, 255, 0)');

    new Chart(ctx2, {
        type: 'line',
        data: {
            labels: tanggal,
            datasets: [{
                label: 'Jumlah Pengunjung',
                data: jumlah,
                fill: true,
                backgroundColor: gradient,
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                tension: 0.3,
                pointBackgroundColor: jumlah.map(j => j > 80 ? '#dc3545' : (j > 50 ? '#ffc107' : '#28a745')),
                pointRadius: 5,
                pointHoverRadius: 8,
                pointBorderWidth: 1
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true },
                x: { ticks: { color: '#555' } }
            }
        }
    });
</script>
@endsection
