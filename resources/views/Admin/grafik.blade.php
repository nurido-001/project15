@extends('layouts.app')

@section('title', 'Grafik Pengguna & Admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4 text-center text-primary animate__animated animate__fadeInDown">
        🌊 Grafik Aktivitas Admin & Pengguna Bulan Ini
    </h4>

    <div class="card shadow-lg border-0 rounded-4 overflow-hidden" 
         style="background: linear-gradient(135deg, #0f2027, #203a43, #2c5364); color: #e0f7fa; position: relative;">
        <div class="card-body position-relative">
            <p class="text-light mb-4 text-center animate__animated animate__fadeIn">
                Jumlah akun <b>Admin</b> dan <b>Pengguna</b> dalam <b>30 hari terakhir</b>.
                <br><small class="text-secondary">Area dengan cahaya cyan lembut menandakan akhir pekan (Sabtu & Minggu).</small>
            </p>

            <div id="grafik-pengguna" style="height: 420px; z-index: 2; position: relative;"></div>

            <!-- Efek Gelombang di Bawah Grafik -->
            <div class="wave-bg">
                <svg viewBox="0 0 1440 320" preserveAspectRatio="none">
                    <path fill="rgba(0,255,255,0.08)">
                        <animate attributeName="d" dur="10s" repeatCount="indefinite"
                            values="
                            M0,160 C360,260 1080,60 1440,160 L1440,320 L0,320 Z;
                            M0,180 C360,120 1080,300 1440,180 L1440,320 L0,320 Z;
                            M0,160 C360,260 1080,60 1440,160 L1440,320 L0,320 Z
                            " />
                    </path>
                </svg>
            </div>
        </div>
    </div>
</div>

<style>
.wave-bg {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 120px;
    overflow: hidden;
    z-index: 1;
    opacity: 0.9;
}
</style>
@endsection

@push('scripts')
<!-- Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<!-- ApexCharts -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const labels = @json($labels ?? []);
    const dataPengguna = @json($dataPengguna ?? []);
    const dataAdmin = @json($dataAdmin ?? []);

    const weekendRegions = labels.map((tanggal, i) => {
        const day = new Date(tanggal).getDay();
        if (day === 0 || day === 6) {
            return {
                x: tanggal,
                borderColor: 'rgba(0,255,255,0.3)',
                fillColor: 'rgba(0,255,255,0.08)',
                label: { text: day === 6 ? 'Sabtu' : 'Minggu', style: { color: '#00FFFF', background: 'transparent' } }
            };
        }
        return null;
    }).filter(Boolean);

    const options = {
        chart: {
            type: 'area',
            height: 420,
            foreColor: '#e0f7fa',
            background: 'transparent',
            toolbar: { show: false },
            animations: {
                enabled: true,
                easing: 'easeinout',
                speed: 1300,
                animateGradually: { enabled: true, delay: 300 },
                dynamicAnimation: { enabled: true, speed: 700 }
            }
        },
        colors: ['#00E396', '#0090FF'],
        stroke: { curve: 'smooth', width: 3 },
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.1,
                stops: [0, 90, 100]
            }
        },
        grid: { borderColor: 'rgba(255,255,255,0.1)', strokeDashArray: 4 },
        dataLabels: { enabled: false },
        markers: {
            size: 5,
            colors: ['#00E396', '#0090FF'],
            strokeWidth: 2,
            hover: { size: 8 }
        },
        series: [
            { name: 'Pengguna', data: dataPengguna },
            { name: 'Admin', data: dataAdmin }
        ],
        xaxis: {
            categories: labels,
            labels: { style: { colors: '#e0f7fa' } },
            axisTicks: { show: false },
            axisBorder: { color: 'rgba(255,255,255,0.2)' }
        },
        yaxis: {
            min: 0,
            labels: { style: { colors: '#e0f7fa' } }
        },
        tooltip: {
            theme: 'dark',
            y: { formatter: val => val + " akun" },
            custom: function({ series, seriesIndex, dataPointIndex, w }) {
                const day = w.globals.labels[dataPointIndex];
                const val = series[seriesIndex][dataPointIndex];
                const role = w.globals.seriesNames[seriesIndex];
                const message = (val > 3) ? "📈 Lonjakan aktivitas!" : "📉 Hari tenang";
                return `
                    <div style="padding:8px 12px; background:rgba(15,32,39,0.95); border-radius:8px;">
                        <b>${day}</b><br>
                        <span style="color:${seriesIndex === 0 ? '#00E396' : '#0090FF'}">${role}</span>: ${val} akun<br>
                        <small>${message}</small>
                    </div>
                `;
            }
        },
        annotations: { xaxis: weekendRegions },
        legend: {
            position: 'top',
            horizontalAlign: 'center',
            labels: { colors: '#e0f7fa' },
            markers: { radius: 12 }
        },
        responsive: [{ breakpoint: 768, options: { chart: { height: 300 } } }]
    };

    const chart = new ApexCharts(document.querySelector("#grafik-pengguna"), options);
    chart.render();
});
</script>
@endpush
