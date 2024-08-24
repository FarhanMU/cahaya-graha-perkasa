@extends('components.layouts.cms.app')

@section('title', 'Tambah Data Driver')

@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light"><a href="{{ route('pengemudi.index') }}">Pengemudi /</a></span> Tambah
            Data Driver
        </h4>

        <!-- Tampilkan Pesan Validasi -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Tambah Data Pengemudi</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('pengemudi.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Nama Supir</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Supir"
                                required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nik" class="form-label">No KTP</label>
                            <input type="text" class="form-control" id="nik" name="nik" placeholder="No KTP / NIK"
                                required maxlength="16">


                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="no_hp" class="form-label">No Hp</label>
                            <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="No HP / WA"
                                required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="gender" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" id="gender" name="gender" required>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="religion" class="form-label">Agama</label>
                            <input type="text" class="form-control" id="religion" name="religion" placeholder="Agama"
                                required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="date_place" class="form-label">Tempat Tanggal Lahir</label>
                            <input type="text" class="form-control" id="date_place" name="date_place"
                                placeholder="Tempat Tanggal Lahir" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>
            </div>
        </div>
    </div>
    <!--/ Content -->

    <!-- Footer -->
    @include('partials.cms.footer')
    <!-- / Footer -->

    <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
@endsection