@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h3 class="mb-4 fw-bold">Dashboard Admin</h3>

  {{-- Statistik Singkat --}}
  <div class="row g-4 mb-4">
    <div class="col-md-3">
      <div class="card text-center shadow-sm border-0">
        <div class="card-body">
          <h6 class="card-title">Total Admin</h6>
          <h3 class="fw-bold">{{ $totalAdmin ?? 0 }}</h3>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card text-center shadow-sm border-0">
        <div class="card-body">
          <h6 class="card-title">Total Pengguna</h6>
          <h3 class="fw-bold">{{ $totalPengguna ?? 0 }}</h3>
        </div>
      </div>
    </div>

    {{-- ✅ Ganti dari $totalTempatWisata jadi $totalWisata --}}
    <div class="col-md-3">
      <div class="card text-center shadow-sm border-0">
        <div class="card-body">
          <h6 class="card-title">Wisata</h6>
          <h3 class="fw-bold">{{ $totalWisata ?? 0 }}</h3>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card text-center shadow-sm border-0">
        <div class="card-body">
          <h6 class="card-title">Penilaian</h6>
          <h3 class="fw-bold">{{ $totalPenilaian ?? 0 }}</h3>
        </div>
      </div>
    </div>
  </div>

  {{-- Grafik Pengguna --}}
  <div class="card mb-4 shadow-sm border-0">
    <div class="card-header bg-light fw-bold">
      <h5 class="mb-0 text-primary">Grafik Pengguna per Bulan</h5>
    </div>
    <div class="card-body">
      <div id="grafik-pengguna"></div>
    </div>
  </div>

  {{-- Data Terbaru --}}
  <div class="row">
    {{-- Pengguna Terbaru --}}
    <div class="col-md-6">
      <div class="card mb-4 shadow-sm border-0">
        <div class="card-header bg-light fw-bold">
          <h5 class="mb-0 text-primary">Pengguna Terbaru</h5>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-hover table-sm mb-0">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Created At</th>
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
                <tr><td colspan="3" class="text-center">Belum ada data</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>

    {{-- Wisata Terbaru --}}
    <div class="col-md-6">
      <div class="card mb-4 shadow-sm border-0">
        <div class="card-header bg-light fw-bold">
          <h5 class="mb-0 text-primary">Wisata Terbaru</h5>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-hover table-sm mb-0">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Lokasi</th>
                <th>Created At</th>
              </tr>
            </thead>
            <tbody>
              @forelse($latestWisata as $wisata)
                <tr>
                  <td>{{ $wisata->nama ?? '-' }}</td>
                  <td>{{ $wisata->lokasi ?? '-' }}</td>
                  <td>{{ $wisata->created_at ? $wisata->created_at->format('d M Y') : '-' }}</td>
                </tr>
              @empty
                <tr><td colspan="3" class="text-center">Belum ada data</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  {{-- Admin Terbaru --}}
  <div class="card mb-4 shadow-sm border-0">
    <div class="card-header bg-light fw-bold">
      <h5 class="mb-0 text-primary">Admin Terbaru</h5>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-hover table-sm mb-0">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Created At</th>
          </tr>
        </thead>
        <tbody>
          @forelse($latestAdmins as $admin)
            <tr>
              <td>{{ $admin->nama ?? '-' }}</td>
              <td>{{ $admin->email ?? '-' }}</td>
              <td>{{ $admin->created_at ? $admin->created_at->format('d M Y') : '-' }}</td>
            </tr>
          @empty
            <tr><td colspan="3" class="text-center">Belum ada data</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  {{-- Penilaian Terbaru --}}
  <div class="card mb-4 shadow-sm border-0">
    <div class="card-header bg-light fw-bold">
      <h5 class="mb-0 text-primary">Penilaian Terbaru</h5>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-hover table-sm mb-0">
        <thead>
          <tr>
            <th>Pengguna</th>
            <th>Wisata</th>
            <th>Rating</th>
            <th>Created At</th>
          </tr>
        </thead>
        <tbody>
          {{-- ✅ Tambahkan pengecekan aman --}}
          @forelse($latestReview ?? [] as $review)
            <tr>
              <td>{{ $review->pengguna->nama ?? '-' }}</td>
              <td>{{ $review->wisata->nama ?? '-' }}</td>
              <td>{{ $review->rating ?? '-' }}</td>
              <td>{{ $review->created_at ? $review->created_at->format('d M Y') : '-' }}</td>
            </tr>
          @empty
            <tr><td colspan="4" class="text-center">Belum ada data</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
  var options = {
    chart: { type: 'line', height: 300 },
    series: [{
      name: 'Jumlah Pengguna',
      data: @json($data ?? []),
    }],
    colors: ['#008FFB'],
    xaxis: {
      categories: @json($labels ?? []),
    },
    stroke: { curve: 'smooth' },
    markers: { size: 4 }
  };

  var chart = new ApexCharts(document.querySelector("#grafik-pengguna"), options);
  chart.render();
</script>
@endpush
