@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  {{-- Judul --}}
  <div class="text-center mb-5">
    <h2 class="fw-bold text-primary fade-in">Selamat Datang di Dashboard WisataKu</h2>
    <p class="text-muted">Pantau data wisata, pengguna, dan penilaian terbaru di satu tempat.</p>
  </div>

  {{-- Statistik Singkat --}}
  <div class="row g-4 mb-4">
    @php
      $stats = [
        ['label' => 'Total Admin', 'value' => $totalAdmin ?? 0, 'icon' => 'ti ti-user-shield', 'color' => 'primary'],
        ['label' => 'Total Pengguna', 'value' => $totalPengguna ?? 0, 'icon' => 'ti ti-users', 'color' => 'success'],
        ['label' => 'Total Wisata', 'value' => $totalWisata ?? 0, 'icon' => 'ti ti-map-2', 'color' => 'info'],
        ['label' => 'Total Penilaian', 'value' => $totalPenilaian ?? 0, 'icon' => 'ti ti-star', 'color' => 'warning'],
      ];
    @endphp

    @foreach($stats as $s)
      <div class="col-md-3 col-sm-6">
        <div class="card shadow-sm border-0 hover-card fade-up">
          <div class="card-body text-center">
            <div class="rounded-circle bg-{{ $s['color'] }} bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-2" style="width:50px;height:50px;">
              <i class="{{ $s['icon'] }} text-{{ $s['color'] }} fs-4"></i>
            </div>
            <h6 class="card-title text-muted">{{ $s['label'] }}</h6>
            <h3 class="fw-bold text-{{ $s['color'] }}">{{ $s['value'] }}</h3>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  {{-- Grafik Pengguna --}}
  <div class="card mb-4 shadow-sm border-0 fade-up">
    <div class="card-header bg-light fw-bold d-flex align-items-center">
      <i class="ti ti-chart-line text-primary me-2"></i> Grafik Pengguna per Bulan
    </div>
    <div class="card-body">
      <div id="grafik-pengguna" style="min-height:300px;"></div>
    </div>
  </div>

  {{-- Data Terbaru --}}
  <div class="row fade-up">
    {{-- Pengguna Terbaru --}}
    <div class="col-md-6">
      <div class="card mb-4 shadow-sm border-0">
        <div class="card-header bg-light fw-bold text-primary">
          <i class="ti ti-users me-2"></i>Pengguna Terbaru
        </div>
        <div class="table-responsive">
          <table class="table table-hover table-striped mb-0">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal</th>
              </tr>
            </thead>
            <tbody>
              @forelse($latestPengguna as $p)
                <tr>
                  <td>{{ $p->nama ?? '-' }}</td>
                  <td>{{ $p->email ?? '-' }}</td>
                  <td>{{ $p->created_at ? $p->created_at->format('d M Y') : '-' }}</td>
                </tr>
              @empty
                <tr><td colspan="3" class="text-center text-muted">Belum ada data</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>

    {{-- Wisata Terbaru --}}
    <div class="col-md-6">
      <div class="card mb-4 shadow-sm border-0">
        <div class="card-header bg-light fw-bold text-primary">
          <i class="ti ti-map-pin me-2"></i>Wisata Terbaru
        </div>
        <div class="table-responsive">
          <table class="table table-hover table-striped mb-0">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Lokasi</th>
                <th>Tanggal</th>
              </tr>
            </thead>
            <tbody>
              @forelse($latestWisata as $w)
                <tr>
                  <td>{{ $w->nama ?? '-' }}</td>
                  <td>{{ $w->lokasi ?? '-' }}</td>
                  <td>{{ $w->created_at ? $w->created_at->format('d M Y') : '-' }}</td>
                </tr>
              @empty
                <tr><td colspan="3" class="text-center text-muted">Belum ada data</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  {{-- Review & Admin Terbaru --}}
  <div class="row fade-up">
    <div class="col-md-6">
      <div class="card mb-4 shadow-sm border-0">
        <div class="card-header bg-light fw-bold text-primary">
          <i class="ti ti-user-shield me-2"></i>Admin Terbaru
        </div>
        <div class="table-responsive">
          <table class="table table-hover table-striped mb-0">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal</th>
              </tr>
            </thead>
            <tbody>
              @forelse($latestAdmins as $a)
                <tr>
                  <td>{{ $a->nama ?? '-' }}</td>
                  <td>{{ $a->email ?? '-' }}</td>
                  <td>{{ $a->created_at ? $a->created_at->format('d M Y') : '-' }}</td>
                </tr>
              @empty
                <tr><td colspan="3" class="text-center text-muted">Belum ada data</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>

    {{-- Penilaian Terbaru --}}
    <div class="col-md-6">
      <div class="card mb-4 shadow-sm border-0">
        <div class="card-header bg-light fw-bold text-primary">
          <i class="ti ti-star me-2"></i>Penilaian Terbaru
        </div>
        <div class="table-responsive">
          <table class="table table-hover table-striped mb-0">
            <thead>
              <tr>
                <th>Pengguna</th>
                <th>Wisata</th>
                <th>Rating</th>
                <th>Tanggal</th>
              </tr>
            </thead>
            <tbody>
              {{-- @forelse($latestReview as $r)
                <tr>
                  <td>{{ $r->pengguna->nama ?? '-' }}</td>
                  <td>{{ $r->wisata->nama ?? '-' }}</td>
                  <td>
                    <span class="text-warning">{{ str_repeat('⭐', $r->rating) }}</span>
                  </td>
                  <td>{{ $r->created_at ? $r->created_at->format('d M Y') : '-' }}</td>
                </tr>
              @empty
                <tr><td colspan="4" class="text-center text-muted">Belum ada data</td></tr>
              @endforelse --}}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
  // Grafik Pengguna
  var options = {
    chart: { type: 'line', height: 300, animations: { easing: 'easeinout', speed: 800 }},
    series: [{
      name: 'Jumlah Pengguna',
      data: @json($data ?? []),
    }],
    colors: ['#008FFB'],
    xaxis: { categories: @json($labels ?? []), title: { text: 'Bulan' } },
    yaxis: { title: { text: 'Jumlah' } },
    stroke: { curve: 'smooth', width: 3 },
    markers: { size: 4 },
    grid: { borderColor: '#eee' }
  };
  new ApexCharts(document.querySelector("#grafik-pengguna"), options).render();
</script>

<style>
  .fade-in { animation: fadeIn 1.2s ease-in-out; }
  .fade-up { animation: fadeUp 0.9s ease-in-out; }
  .hover-card:hover { transform: translateY(-4px); transition: .3s; box-shadow: 0 6px 18px rgba(0,0,0,.1); }
  @keyframes fadeIn { from {opacity: 0;} to {opacity: 1;} }
  @keyframes fadeUp { from {opacity: 0; transform: translateY(20px);} to {opacity: 1; transform: translateY(0);} }
</style>
@endpush
