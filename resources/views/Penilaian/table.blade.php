@if($penilaians->count() > 0)
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Wisata</th>
                    <th>Rating</th>
                    <th>Komentar</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penilaians as $key => $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->wisata->nama_wisata ?? '-' }}</td>
                    <td>{{ $item->rating }} ⭐</td>
                    <td>{{ $item->komentar ?? '-' }}</td>
                    <td>{{ $item->created_at->format('d M Y') }}</td>
                    <td>
                        @if(Auth::id() === $item->pengguna_id)
                            <form action="{{ route('penilaian.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus review ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p class="text-muted mb-0">Belum ada penilaian yang tersedia.</p>
@endif
