Baik\! Ini adalah tantangan yang menarik. Saya akan membuat skema warna yang kaya dengan kombinasi Kuning, Biru Muda & Tua, Hijau Muda & Sedang, serta Biru Telur Asin.

Saya akan menerapkan warna-warna ini pada:

  * Warna garis dan area grafik pengunjung.
  * Warna batang pada grafik data sistem.
  * Warna latar belakang card agar sesuai.
  * Warna teks judul.

Saya juga akan tetap mempertahankan pengaturan tinggi grafik yang lebih panjang dan pemotongan data untuk 15 hari terakhir pada grafik pengunjung.

Berikut adalah seluruh kode lengkapnya:

````html
@extends('layouts.app')

@section('title', 'Grafik Statistik')

@section('content')
<div class="container mt-4">
    
    <h1 class="text-center mb-5" style="color: #3f51b5; font-weight: 700;">
        ✨ Statistik WisataKu - Wawasan Data
    </h1>
    
    <h2 class="text-center mb-3" style="color: #FFC107;">
        📈 Tren Kunjungan Harian 15 Hari Terakhir
    </h2>

    <div class="card shadow-lg p-4 mb-5 border-0"
        style="background: linear-gradient(135deg, #fffde7 0%, #fff9c4 100%); /* Latar belakang kuning muda */
                border-radius: 25px;
                transition: transform 0.3s ease-in-out;"
        onmouseover="this.style.transform='translateY(-5px)'"
        onmouseout="this.style.transform='translateY(0)'">
        
        <canvas id="visitorChart" height="180"></canvas>
    </div>

    <h2 class="text-center mb-3 mt-5" style="color: #4CAF50;">
        📊 Komposisi Data Utama Sistem
    </h2>

    <div class="card shadow-lg p-4 border-0"
        style="background: linear-gradient(135deg, #e0f2f7 0%, #b3e5fc 100%); /* Latar belakang biru muda */
                border-radius: 25px;
                transition: transform 0.3s ease-in-out;"
        onmouseover="this.style.transform='translateY(-5px)'"
        onmouseout="this.style.transform='translateY(0)'">
        
        <canvas id="systemDataChart" height="180"></canvas>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    
    // --- SKEMA WARNA BARU: Kuning, Biru Muda & Tua, Hijau Muda & Sedang, Biru Telur Asin ---
    const colorYellow = '#FFEB3B';       // Kuning cerah
    const colorLightBlue = '#2196F3';    // Biru Muda (standar)
    const colorDarkBlue = '#3F51B5';     // Biru Tua (indigo)
    const colorLightGreen = '#8BC34A';   // Hijau Muda (lime green)
    const colorMediumGreen = '#4CAF50';  // Hijau Sedang (standard green)
    const colorTeal = '#00BCD4';         // Biru Telur Asin (Cyan)

    // --- 1. Konfigurasi Grafik Garis (Pengunjung 15 Hari Terakhir) ---
    const ctxVisitor = document.getElementById('visitorChart').getContext('2d');
    
    // Data yang diambil dari Controller
    let tanggalData = @json($tanggal);
    let pengunjungData = @json($pengunjung);
    
    // Operasi Pemotongan Data (Mengambil 15 Data Terakhir)
    const limit = 15;
    tanggalData = tanggalData.slice(-limit); 
    pengunjungData = pengunjungData.slice(-limit); 
    // Data sekarang hanya berisi 15 hari terakhir.

    // Gradien untuk area di bawah garis (Menggunakan warna Kuning)
    const gradientVisitor = ctxVisitor.createLinearGradient(0, 0, 0, 300);
    gradientVisitor.addColorStop(0, 'rgba(255, 235, 59, 0.4)'); // Kuning cerah, opacity 40%
    gradientVisitor.addColorStop(1, 'rgba(255, 235, 59, 0)');  // Kuning cerah, transparan

    new Chart(ctxVisitor, {
        type: 'line',
        data: {
            labels: tanggalData,
            datasets: [{
                label: 'Jumlah Pengunjung',
                data: pengunjungData,
                borderWidth: 4,
                tension: 0.4,
                fill: true,
                backgroundColor: gradientVisitor, 
                borderColor: colorYellow, // Garis Kuning
                pointRadius: 6,
                pointBackgroundColor: colorYellow,
                pointBorderColor: '#ffffff',
                pointHoverRadius: 8,
                pointHoverBackgroundColor: colorDarkBlue // Hover Biru Tua
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                duration: 1500,
                easing: 'easeInOutQuart'
            },
            plugins: {
                title: {
                    display: false
                },
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        boxWidth: 8,
                        font: {
                            size: 14
                        }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.7)',
                    titleFont: { size: 14 },
                    bodyFont: { size: 12 },
                    padding: 10,
                    boxPadding: 5
                }
            },
            scales: {
                y: { 
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Jumlah Kunjungan',
                        font: { size: 14, weight: 'bold' },
                        color: '#6c757d'
                    },
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    },
                    ticks: {
                        color: '#495057',
                        callback: function(value) {
                            if (value % 1 === 0) {
                                return value;
                            }
                        }
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Tanggal',
                        font: { size: 14, weight: 'bold' },
                        color: '#6c757d'
                    },
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#495057'
                    }
                }
            }
        }
    });

    // --- 2. Konfigurasi Grafik Batang (Jumlah Data Sistem) ---
    const ctxSystem = document.getElementById('systemDataChart').getContext('2d');
    
    // Data yang diambil dari Controller
    const systemLabels = @json($labels); 
    const systemData = @json($data);

    // SKEMA WARNA BARU untuk batang: Pengguna, Administrator, Wisata
    const barColors = [
        colorLightBlue,   // Pengguna: Biru Muda
        colorMediumGreen, // Administrator: Hijau Sedang
        colorTeal         // Wisata: Biru Telur Asin
    ];

    new Chart(ctxSystem, {
        type: 'bar',
        data: {
            labels: systemLabels,
            datasets: [{
                label: 'Total Entitas',
                data: systemData,
                backgroundColor: barColors.map(color => color + 'A0'), // Opacity 60%
                borderColor: barColors,
                borderWidth: 2,
                borderRadius: 8,
                barPercentage: 0.7,
                categoryPercentage: 0.8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                duration: 1500,
                easing: 'easeInOutQuart',
            },
            plugins: {
                title: {
                    display: false
                },
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.7)',
                    titleFont: { size: 14 },
                    bodyFont: { size: 12 },
                    padding: 10,
                    boxPadding: 5
                },
                datalabels: {
                    display: false,
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Jumlah Data',
                        font: { size: 14, weight: 'bold' },
                        color: '#6c757d'
                    },
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    },
                    ticks: {
                        color: '#495057',
                        callback: function(value) {
                            if (value % 1 === 0) {
                                return value;
                            }
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#495057',
                        font: { weight: 'bold' }
                    }
                }
            }
        }
    });
});
</script>
@endpush