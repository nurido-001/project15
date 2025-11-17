@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y fade-in">
  <div class="dashboard-bg">
    <h4 class="fw-bold py-3 mb-4 text-gradient">Dashboard</h4>

    {{-- Statistik Card --}}
    <div class="row g-4">
      <div class="col-md-3">
        <div class="card stat-card hover-card glass-card text-center p-3">
          <div class="card-body">
            <h6 class="text-muted">Total Admin</h6>
            <h3 class="fw-bold text-primary">{{ $totalAdmin }}</h3>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card stat-card hover-card glass-card text-center p-3">
          <div class="card-body">
            <h6 class="text-muted">Total Pengguna</h6>
            <h3 class="fw-bold text-success">{{ $totalPengguna }}</h3>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card stat-card hover-card glass-card text-center p-3">
          <div class="card-body">
            <h6 class="text-muted">Total Wisata</h6>
            <h3 class="fw-bold text-warning">{{ $totalWisata }}</h3>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card stat-card hover-card glass-card text-center p-3">
          <div class="card-body">
            <h6 class="text-muted">Total Penilaian</h6>
            <h3 class="fw-bold text-danger">{{ $totalPenilaian }}</h3>
          </div>
        </div>
      </div>
    </div>

    {{-- Grafik 
    <div class="row mt-5">
      <div class="col-12">
        <div class="card glass-card p-3 fade-up">
          <div class="card-body">
            <div id="grafikPenilaian" style="height: 350px;"></div>
          </div>
        </div>
      </div>
    </div> --}}

    {{-- Data Terbaru --}}
    <div class="row mt-5">
      <div class="col-12">
        <div class="card glass-card p-3 fade-up">
          <div class="card-header fw-bold">Penilaian Terbaru</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered align-middle">
                <thead class="bg-gradient text-dark">
                  <tr>
                    <th>Pengguna</th>
                    <th>Wisata</th>
                    <th>Rating</th>
                    <th>Tanggal</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($latestPenilaian as $r)
                    <tr>
                      <td>{{ $r->pengguna->nama ?? '-' }}</td>
                      <td>{{ $r->wisata->nama ?? '-' }}</td>
                      <td>{{ $r->rating }}</td>
                      <td>{{ $r->created_at->format('d M Y') }}</td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="4" class="text-center text-muted">Belum ada data penilaian</td>
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
</div>
@endsection

{{-- Tema dan animasi --}}
@push('styles')
<style>
  body {
    background: linear-gradient(135deg, #f0faff, #e0f7fa);
  }

  .dashboard-bg {
    background: linear-gradient(135deg, #f8fdff, #ecf9f6);
    border-radius: 16px;
    padding: 25px;
    box-shadow: inset 0 0 20px rgba(0,0,0,0.05);
  }

  .text-gradient {
    background: linear-gradient(90deg, #00b894, #0984e3);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .fade-in { animation: fadeIn 1.2s ease-in-out; }
  .fade-up { animation: fadeUp 1s ease-in-out forwards; opacity: 0; }

  /* Efek muncul bertahap untuk setiap card */
  .stat-card {
    opacity: 0;
    transform: translateY(25px);
    animation: fadeUpCard 0.6s ease-out forwards;
  }
  .stat-card:nth-child(1) { animation-delay: 0.1s; }
  .stat-card:nth-child(2) { animation-delay: 0.3s; }
  .stat-card:nth-child(3) { animation-delay: 0.5s; }
  .stat-card:nth-child(4) { animation-delay: 0.7s; }

  @keyframes fadeUpCard {
    from { opacity: 0; transform: translateY(25px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .hover-card:hover { transform: translateY(-6px); transition: .4s; box-shadow: 0 8px 20px rgba(0,0,0,0.15); }

  .glass-card {
    background: rgba(255,255,255,0.75);
    backdrop-filter: blur(8px);
    border-radius: 12px;
    transition: all .3s ease;
  }

  .glass-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
  }

  @keyframes fadeIn { from {opacity: 0;} to {opacity: 1;} }
  @keyframes fadeUp { from {opacity: 0; transform: translateY(20px);} to {opacity: 1; transform: translateY(0);} }
</style>
@endpush

@push('scripts')
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll(".stat-card");
    cards.forEach((card, index) => {
      setTimeout(() => {
        card.style.opacity = 1;
        card.style.transform = "translateY(0)";
      }, 200 * index);
    });
  });

  // ApexCharts grafik tetap aman
  var options = {
    chart: { type: 'area', height: 350, toolbar: { show: false } },
    series: [{
      name: 'Jumlah Penilaian',
      data: @json($grafikData['jumlah'])
    }],
    xaxis: { categories: @json($grafikData['bulan']) },
    colors: ['#00b894'],
    fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.7, opacityTo: 0.2, stops: [0, 90, 100] } }
  };
  var chart = new ApexCharts(document.querySelector("#grafikPenilaian"), options);
  chart.render();
</script>
@endpush
