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
                            <th>Link</th>
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
                            data: 'slug',
                            name: 'slug',
                            render: function (data, type, row, meta) {
                                return `<a href="/id-card/${data}" target="_blank" >open</a>`;
                            }
                        },                    
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

                // SweetAlert confirmation
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
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                table.ajax.reload(); // Reload DataTable after delete
                                Swal.fire(
                                    'Deleted!',
                                    'Your card has been deleted.',
                                    'success'
                                );
                            },
                            error: function(xhr) {
                                Swal.fire(
                                    'Failed!',
                                    'Failed to delete the card.',
                                    'error'
                                );
                            }
                        });
                    }
                });
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