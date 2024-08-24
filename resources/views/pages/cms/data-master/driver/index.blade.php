@extends('components.layouts.cms.app')

@section('title', 'Data Master - Pengemudi')

@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Pengemudi</span> </h4>

        <!-- Ajax Sourced Server-side -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="m-0">Data Pengemudi</h5>
                <a href="{{ route('pengemudi.create') }}">
                    <button type="button" class="btn btn-primary">
                        <i class="ti ti-plus me-1"></i> Tambah Data
                    </button>
                </a>
            </div>
            <div class="card-datatable text-nowrap">
                <table class="datatables-ajax table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>No KTP</th>
                            <th>No HP</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Tempat Tanggal Lahir</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!--/ Ajax Sourced Server-side -->
    </div>
    <!--/ Content -->

    <!-- Footer -->
    @include('partials.cms.footer')
    <!-- / Footer -->

    <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
@endsection

@push('scripts')
<script>
    $(function () {
        var dt_ajax_table = $(".datatables-ajax");

        if (dt_ajax_table.length) {
            dt_ajax_table.DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('pengemudi.index') }}',
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'nik', name: 'nik' },
                    { data: 'no_hp', name: 'no_hp' },
                    { data: 'gender', name: 'gender' },
                    { data: 'religion', name: 'religion' },
                    { data: 'date_place', name: 'date_place' },
                ],
                dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>><"table-responsive"t><"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            });
        }

        setTimeout(() => {
            $(".dataTables_filter .form-control").removeClass("form-control-sm");
            $(".dataTables_length .form-select").removeClass("form-select-sm");
        }, 200);
    });
</script>
<script>
    @if(session('success'))
        toastr.success("{{ session('success') }}", 'Success', { 
            closeButton: true, 
            progressBar: true, 
            positionClass: 'toast-bottom-right' 
        });
    @endif
</script>

@endpush