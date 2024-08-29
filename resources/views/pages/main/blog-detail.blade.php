@extends('components.layouts.main.app')

@section('content')

@section('title', $content->title . ' | Cahaya Graha Perkasa')

@php
$metaDescription = Str::limit($content->description, 160); // Mengambil 160 karakter pertama dari deskripsi
$metaKeywords = 'blog, ' . $content->title . ', articles, insights';
$metaAuthor = 'PT Cahaya Graha Perkas';
$metaOgTitle = $content->title . ' | PT Cahaya Graha Perkas';
$metaOgDescription = $metaDescription;
$metaOgImage = asset('assets/img/custom/storage/blog/' . $content->image); // Gambar untuk social media sharing
$metaTwitterTitle = $metaOgTitle;
$metaTwitterDescription = $metaDescription;
$metaTwitterImage = $metaOgImage;
@endphp

<!-- Blog Detail Section -->
<div class="container" style="margin-top: 8em;">
    <div class="row">
        <div class="col-md-12">
            <img src="{{ asset('assets/img/custom/storage/blog'). '/' .  $content->image  }}" class="card-img-top"
                alt="Steel Construction" style="max-width: 100%; max-height: 50em; object-fit:cover">

            <div class="card-body mt-3">
                <h3 class="card-title fw-bold">{{ $content->title }}</h3>
                <small class="text-muted">{{ $content->created_at }}</small>
                <p class="card-text mt-3">{!! $content->description !!}.</p>
            </div>
        </div>
    </div>
</div>




@endsection

@push('scripts')


@endpush