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
                <h5 class="m-0">Data Card</h5>
                <a href="{{ route('card.create') }}">
                    <button type="button" class="btn btn-primary">
                        <i class="ti ti-plus me-1"></i> Tambah Data
                    </button>
                </a>
            </div>

            <div class="card-datatable text-nowrap">
                <table class="datatables-ajax table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Action</th> <!-- Kolom untuk aksi -->
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
            var table = dt_ajax_table.DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('card.index') }}',
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'position', name: 'position' },
                    { 
                        data: 'id', 
                        name: 'action', 
                        orderable: false, 
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `
                                <a href="{{ route('card.edit', ':id') }}" class="btn btn-sm btn-primary">Edit</a>
                                <button type="button" class="btn btn-sm btn-danger btn-delete" data-id=":id">Delete</button>
                            `.replace(/:id/g, data);
                        }
                    },
                ],
                dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>><"table-responsive"t><"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            });

            // Handle Delete Button Click
            dt_ajax_table.on('click', '.btn-delete', function() {
                var id = $(this).data('id');
                var url = "{{ route('card.destroy', ':id') }}".replace(':id', id);

                if (confirm('Are you sure you want to delete this card?')) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            table.ajax.reload(); // Reload DataTable after delete
                            toastr.success(response.message, 'Success', { 
                                closeButton: true, 
                                progressBar: true, 
                                positionClass: 'toast-bottom-right' 
                            });
                        },
                        error: function(xhr) {
                            toastr.error('Failed to delete the card.', 'Error', { 
                                closeButton: true, 
                                progressBar: true, 
                                positionClass: 'toast-bottom-right' 
                            });
                        }
                    });
                }
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