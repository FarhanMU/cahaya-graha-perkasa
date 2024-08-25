@extends('components.layouts.cms.app')

@section('title', 'Dashboard')

@section('content')

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Beranda/</span> Our Product</h4>

        <!-- Menampilkan pesan sukses -->
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="row">
            @foreach($our_product as $index => $ourProduct)
            <!-- Wrap number and its data inside another card -->
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">{{ $index + 1 }}.</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end mb-4">
                                <!-- Tombol delete untuk menghapus pasangan form -->
                                <form action="{{ route('ourProduct.destroy', $ourProduct->id) }}" method="POST"
                                    class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger delete-btn">Delete</button>
                                </form>
                            </div>

                            @foreach($ourProduct->contents as $content)
                            <div class="col-xl-6">
                                <div class="card mb-4 border-0">
                                    <div class="card-header d-flex justify-content-between align-items-center ">
                                        <h5 class="mb-0 fw-normal">Language Code <b>{{ $content->language }}</b></h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('ourProduct.update', $content->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <img src="{{ asset('assets/img/custom/storage/product') . '/'. $content->image  }}"
                                                    class="card-img-top" alt="Product Image"
                                                    style="max-width: 100%; max-height: 400px; object-fit: cover;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="image">Change Image</label>
                                                <input type="file" id="image" name="image" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-phone">Title</label>
                                                <input type="text" id="basic-default-phone" class="form-control"
                                                    name="title" value="{{ old('title', $content->title) }}" required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"
                                                    for="basic-default-message">Description</label>
                                                <textarea id="basic-default-message" class="form-control"
                                                    name="description"
                                                    required>{{ old('description', $content->description) }}</textarea>
                                            </div>
                                            <input type="hidden" name="language" value="{{ $content->language }}">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Tombol untuk menambahkan form baru -->
        <div class="mb-4 d-flex justify-content-end">
            <a href="{{ route('ourProduct.create') }}">
                <button id="add-new-form" class="btn btn-success">Tambah Data Baru</button>
            </a>
        </div>
    </div>
    <!-- / Content -->
</div>
<!-- Content wrapper -->
@endsection

@push('scripts')
<script>
    // Mengatur alert untuk menutup setelah 3 detik (3000 ms)
    setTimeout(function () {
        let alertElement = document.querySelector('.alert');
        if (alertElement) {
            let alert = new bootstrap.Alert(alertElement);
            alert.close();
        }
    }, 3000);

    // SweetAlert confirmation for delete
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const form = this.closest('form');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
    });
</script>
@endpush