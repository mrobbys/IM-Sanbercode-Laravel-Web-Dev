<div class="col-sm-6 col-lg-4 mb-3">
    <div class="product-item border shadow-lg h-100 d-flex flex-column">
        <a href="/books/{{ $item->id }}">
            <figure class="product-style position-relative z-0">
                <span
                    class="badge text-bg-dark position-absolute top-0 end-0 z-3 mt-2 me-2">{{ $item->genre->name }}</span>
                <img src="{{ asset('image/' . $item->image) }}" alt="Books" class="product-item">
                <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Lihat Buku</button>
            </figure>
        </a>
        <figcaption>
            <h3>{{ $item->title }}</h3>
            <span>{{ $item->author }}</span>
        </figcaption>
        @auth
            @if (auth()->user()->role == 'admin')
                <div class="d-grid gap-2">
                    <a href="/books/{{ $item->id }}" class="btn btn-secondary">Detail</a>
                    <a href="/books/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>

                    <!-- Tombol untuk menghapus dan memicu modal konfirmasi -->
                    <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal"
                        data-bs-target="#deleteConfirmationModal{{ $item->id }}">
                        Delete
                    </button>
                </div>
            @endif
        @endauth
    </div>
</div>

<!-- Modal Konfirmasi Hapus Buku -->
<div class="modal fade" id="deleteConfirmationModal{{ $item->id }}" tabindex="-1"
    aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi Penghapusan Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus buku "<strong>{{ $item->title }}</strong>" oleh
                <strong>{{ $item->author }}</strong>?
            </div>
            <div class="modal-footer">
                <!-- Formulir penghapusan buku -->
                <form action="/books/{{ $item->id }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
