<div class="col-sm-6 col-lg-4 mb-4">
    <div class="card d-flex h-100 shadow-lg">
        <div class="card-header">
            No. {{ $loop->iteration }}
        </div>
        <div class="card-body d-flex flex-column">
            <h3 class="card-title">{{ $genre->name }}</h3>
            <p class="card-text flex-grow-1">
                {{ $genre->description }}
            </p>

            <!-- Tombol detail, edit, delete -->
            <div class="d-grid gap-2">
                <a href="/genres/{{ $genre->id }}" class="btn btn-secondary">Detail</a>
                @auth
                    @if (auth()->user()->role == 'admin')
                        <a href="/genres/{{ $genre->id }}/edit" class="btn btn-warning">Edit</a>

                        <!-- Tombol untuk menghapus dan memicu modal konfirmasi -->
                        <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal"
                            data-bs-target="#deleteConfirmationModal{{ $genre->id }}">
                            Delete
                        </button>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus Genre -->
@foreach ($genres as $genre)
    <div class="modal fade" id="deleteConfirmationModal{{ $genre->id }}" tabindex="-1"
        aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi Penghapusan Genre</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus genre "<strong>{{ $genre->name }}</strong>"?
                </div>
                <div class="modal-footer">
                    <!-- Formulir penghapusan genre -->
                    <form action="/genres/{{ $genre->id }}" method="POST" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
