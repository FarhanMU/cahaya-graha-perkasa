@extends('components.layouts.cms.app')

@section('title', 'Dashboard')

@section('content')

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Beranda/</span> Header</h4>

        @foreach($header as $key => $headers)
        @foreach($headers->contents as $content)
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-normal">Language Code <b>{{ $content->language }}</b></h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('header.update', $content->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-phone">Title</label>
                                <input type="text" id="basic-default-phone" class="form-control" name="title"
                                    value="{{ old('title', $content->title) }}" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Description</label>
                                <textarea id="basic-default-message" class="form-control" name="description"
                                    required>{{ old('description', $content->description) }}</textarea>
                            </div>
                            <input type="hidden" name="language" value="{{ $content->language }}">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endforeach
    </div>
    <!-- / Content -->
</div>
<!-- Content wrapper -->
@endsection

@push('scripts')
<script>
    // Mengatur alert untuk menutup setelah 3 detik (3000 ms)
    setTimeout(function() {
        let alertElement = document.querySelector('.alert');
        if (alertElement) {
            let alert = new bootstrap.Alert(alertElement);
            alert.close();
        }
    }, 3000);
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