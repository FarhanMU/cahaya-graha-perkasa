@extends('components.layouts.cms.app')

@section('title', 'Dashboard')

@section('content')


<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Send Email</span> </h4>

        <!-- Ajax Sourced Server-side -->
        <div class="card">

            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="m-0">Data Send Email</h5>
            </div>

            <div class="card-datatable text-nowrap">
                <table class="datatables-ajax table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Description</th>
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
                ajax: '{{ route('sendEmail.index') }}',
                columns: [
                    { 
                        data: null, 
                        name: 'index', 
                        orderable: false, // Kolom ini memang tidak diurutkan karena hanya menampilkan nomor urut
                        searchable: false,
                        render: function (data, type, full, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        } 
                    },
                    { data: 'name', name: 'name' },
                    { data: 'contact', name: 'contact' },
                    { data: 'description', name: 'description' },
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

@endpush