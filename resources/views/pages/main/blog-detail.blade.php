@extends('components.layouts.main.app')

@section('content')

<!-- Blog Detail Section -->
<div class="container" style="margin-top: 8em;">
    <div class="row">
        <div class="col-md-12">
            <img src="{{ asset('assets/img/custom/storage/blog'). '/' .  $content->image  }}" class="card-img-top"
                alt="Steel Construction">
            <div class="card-body mt-3">
                <h3 class="card-title fw-bold">{{ $content->title }}</h3>
                <small class="text-muted">{{ $content->created_at }}</small>
                <p class="card-text mt-3">{{ $content->description }}.</p>
            </div>
        </div>
    </div>
</div>




@endsection

@push('scripts')


@endpush