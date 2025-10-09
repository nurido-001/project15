<form action="{{ route('penilaian.store') }}" method="POST">
    @csrf
    <div class="row g-3">
        <div class="col-md-6">
            <label for="wisata_id" class="form-label">Pilih Wisata</label>
            <select name="wisata_id" id="wisata_id" class="form-select" required>
                <option value="">-- Pilih Wisata --</option>
                @foreach($wisatas as $wisata)
                    <option value="{{ $wisata->id }}">{{ $wisata->nama_wisata }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <label for="rating" class="form-label">Rating</label>
            <select name="rating" id="rating" class="form-select" required>
                <option value="">-- Pilih Rating --</option>
                @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }} ⭐</option>
                @endfor
            </select>
        </div>

        <div class="col-md-12">
            <label for="komentar" class="form-label">Komentar (Opsional)</label>
            <textarea name="komentar" id="komentar" class="form-control" rows="3" placeholder="Tulis pengalaman Anda..."></textarea>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Kirim Penilaian</button>
        </div>
    </div>
</form>
