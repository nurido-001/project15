@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-lg border-0">
                
                {{-- Header --}}
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">{{ $wisata->nama }}</h4>
                </div>

                {{-- Body --}}
                <div class="card-body">
                    <div class="text-center mb-4">
                        @if($wisata->foto)
                            <img src="{{ asset('storage/' . $wisata->foto) }}" 
                                 alt="{{ $wisata->nama }}" 
                                 class="img-fluid rounded shadow-sm" 
                                 style="max-height: 400px; object-fit: cover;">
                        @else
                            <img src="{{ asset('default/opo1.jpg') }}" 
                                 alt="Default Image" 
                                 class="img-fluid rounded shadow-sm" 
                                 style="max-height: 400px; object-fit: cover;">
                        @endif
                    </div>

                    <h5><strong>Lokasi:</strong></h5>
                    <p class="text-muted">{{ $wisata->lokasi }}</p>

                    <h5><strong>Harga Tiket:</strong></h5>
                    <p class="text-muted">
                        @if(!is_null($wisata->harga_tiket))
                            Rp {{ number_format($wisata->harga_tiket, 0, ',', '.') }}
                        @else
                            -
                        @endif
                    </p>

                    <h5><strong>Deskripsi:</strong></h5>
                    <p class="text-muted">{{ $wisata->deskripsi }}</p>

                    {{-- Form Tambah Review --}}
                    <hr>
                    <h5 class="mt-4">Tambah Review</h5>

                    {{-- ⚠️ ganti name hidden input sesuai controller (wisata_id) --}}
                    <form action="{{ route('penilaian.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="wisata_id" value="{{ $wisata->id }}">

                        <div class="mb-3">
                            <label for="rating">Rating</label>
                            <select name="rating" id="rating" class="form-control" required>
                                <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                                <option value="4">⭐⭐⭐⭐ (4)</option>
                                <option value="3">⭐⭐⭐ (3)</option>
                                <option value="2">⭐⭐ (2)</option>
                                <option value="1">⭐ (1)</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="komentar">Komentar</label>
                            <textarea name="komentar" id="komentar" class="form-control" rows="3" maxlength="500"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="ti ti-send"></i> Kirim Review
                        </button>
                    </form>

                    {{-- List Review --}}
                    <hr>
                    <h5 class="mt-4">Review Pengunjung</h5>
                    @forelse($wisata->penilaians as $review)
                        <div class="border rounded p-3 mb-2">
                            <strong>{{ $review->pengguna->nama ?? 'Anonim' }}</strong> 
                            <span class="text-warning">
                                {{ str_repeat('⭐', $review->rating) }}
                            </span>
                            <p class="mb-1">{{ $review->komentar }}</p>
                            <small class="text-muted">
                                {{ $review->created_at->format('d M Y H:i') }}
                            </small>

                            {{-- Jika yang login adalah pemilik review --}}
                            @if(auth()->check() && $review->pengguna_id == auth()->id())
                                <form action="{{ route('penilaian.destroy', $review->id) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus review ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger ms-2">
                                        <i class="ti ti-trash"></i> Hapus
                                    </button>
                                </form>
                            @endif
                        </div>
                    @empty
                        <p class="text-muted">Belum ada review.</p>
                    @endforelse
                </div>

                {{-- Footer --}}
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('wisata.index') }}" class="btn btn-outline-secondary">
                        <i class="ti ti-arrow-left"></i> Kembali
                    </a>
                    <div>
                        <a href="{{ route('wisata.edit', $wisata->id) }}" class="btn btn-outline-warning">
                            <i class="ti ti-edit"></i> Edit
                        </a>
                        <form action="{{ route('wisata.destroy', $wisata->id) }}" 
                              method="POST" 
                              class="d-inline" 
                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="ti ti-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
