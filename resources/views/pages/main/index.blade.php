@extends('components.layouts.main.app')

@section('content')


@section('title', $metaOgTitle ?? 'Cahaya Graha Perkasa')

@php
$metaDescription = 'Discover why we are the best choice. Explore our unique offerings and products tailored to meet your
needs.';
$metaKeywords = 'why us, our products, contact us, company name, services, products';
$metaAuthor = 'PT Cahaya Graha Perkasa';
$metaOgTitle = 'Why Choose Us | PT Cahaya Graha Perkasa';
$metaOgDescription = $metaDescription;
$metaOgImage = asset('assets/img/custom/jumbotron-1.webp'); // Image for social media sharing
$metaTwitterTitle = $metaOgTitle;
$metaTwitterDescription = $metaDescription;
$metaTwitterImage = $metaOgImage;
@endphp



<style>
    .form-control,
    .form-control:hover,
    .form-control:focus {
        border: var(--bs-border-width) solid #dddddd !important;
    }

    .jumbotron-custom {
        position: relative;
        height: 100vh;
        background-color: #0d213f;
    }

    .carousel-inner img {
        height: 100vh;
        object-fit: cover;
        /* Ensures the image covers the entire section */
    }

    .container.custom-container {
        z-index: 2;
    }

    .jumbotron-custom .carousel-inner {
        z-index: 1;
    }

    .carousel-control-prev,
    .carousel-control-next {
        z-index: 3;
    }

    .overlay-dark {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* Adjust the opacity for the desired effect */
        z-index: 1;
    }
</style>


<!-- Jumbotron Section -->
<div class="jumbotron jumbotron-custom text-white position-relative" data-aos="fade-up">
    <!-- Slider as Background -->
    <div id="slider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/assets/img/custom/header/1.jpg" class="d-block w-100" alt="Slide 1">
                <!-- Dark overlay -->
                <div class="overlay-dark"></div>
            </div>
            <div class="carousel-item">
                <img src="/assets/img/custom/header/2.jpg" class="d-block w-100" alt="Slide 2">
                <!-- Dark overlay -->
                <div class="overlay-dark"></div>
            </div>
            <div class="carousel-item">
                <img src="/assets/img/custom/header/3.jpg" class="d-block w-100" alt="Slide 3">
                <!-- Dark overlay -->
                <div class="overlay-dark"></div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Centered Text Section -->
    <div class="container custom-container position-absolute top-50 start-50 translate-middle">
        <div class="text-center">
            <h1 class="display-4 fw-bold text-white">One Stop Solution For Your Project</h1>
            <p class="lead text-white">Welcome to Cahaya Graha Perkasa, the premier choice for all your steel
                construction needs. Whether you are embarking on a commercial, industrial, or residential project, we
                provide comprehensive solutions that ensure durability, efficiency, and excellence.</p>
        </div>
    </div>
</div>


<!-- Visi Misi Section -->
<div id="visiMisi" class="container" style="margin-bottom: 10em; margin-top:5em" data-aos="fade-up">
    <h2 class="text-center fw-bold text-primary mb-5 position-relative fs-1">{{ __('messages.visi_misi_title') }}</h2>
    <div class="row justify-content-center align-items-center text-center mb-4">
        @foreach($why_us as $key => $why)
        @foreach($why->contents as $content)
        <div class="col-md-4  my-4 p-2">
            <div class="shadow-sm p-3">
                <h4 class="fw-bold text-dark fs-2">{{ $content->title }}</h4>
                <p>{{ $content->description }}</p>
            </div>
        </div>
        @endforeach
        @endforeach
    </div>

</div>



<!-- Why Us Section -->
<div style=" background-color: var(--secondary-color)" class="py-1">
    <div id="whyUs" class="container" style="margin-bottom: 10em; margin-top:5em;" data-aos="fade-up">
        <h2 class="text-center fw-bold text-primary mb-5 position-relative fs-1">{{ __('messages.why_us_title') }}</h2>
        @foreach($why_us as $key => $why)
        @foreach($why->contents as $content)
        <div class="row align-items-center mb-4">
            <div class="col-md-6 order-md-{{ $key % 2 == 0 ? '1' : '2' }}">
                <h4 class="fw-bold text-light fs-2">{{ $content->title }}</h4>
                <p class="text-light">{{ $content->description }}</p>
            </div>
            <div class="col-md-6 order-md-{{ $key % 2 == 0 ? '2' : '1' }}">
            </div>
        </div>
        @endforeach
        @endforeach
    </div>
</div>

<!-- Our Client Section -->
<div id="ourClient" class="container" style="margin-bottom: 10em; margin-top:5em" data-aos="fade-up">
    <h2 class="text-center fw-bold text-primary mb-5 position-relative fs-1">{{ __('messages.our_client_title') }}</h2>
    <marquee behavior="scroll" direction="left">
        <img src="{{ asset('assets/img/custom/mitra/1.png') }}" alt="Mitra 1" style="height: 60px; margin: 0 20px;">
        <img src="{{ asset('assets/img/custom/mitra/1.png') }}" alt="Mitra 2" style="height: 60px; margin: 0 20px;">
        <img src="{{ asset('assets/img/custom/mitra/1.png') }}" alt="Mitra 3" style="height: 60px; margin: 0 20px;">
        <img src="{{ asset('assets/img/custom/mitra/1.png') }}" alt="Mitra 4" style="height: 60px; margin: 0 20px;">
    </marquee>
</div>

<!-- product excellence Section -->
<div style=" background-color: var(--secondary-color)" class="py-1">
    <div id="visiMisi" class="container" style="margin-bottom: 10em; margin-top:5em" data-aos="fade-up">
        <h2 class="text-center fw-bold text-primary mb-5 position-relative fs-1">{{
            __('messages.product_excelence_title')
            }}</h2>
        <div class="row justify-content-center align-items-center text-center mb-4">
            @php $counter = 1; @endphp
            <!-- Inisialisasi counter manual -->

            @foreach($why_us as $key => $why)
            @foreach($why->contents as $content )
            <div class="col-md-4  my-4 p-2">
                <div class="shadow-sm p-3">
                    <img src="{{ asset('assets/img/custom/product-excelence') . '/'.  $counter. '.png' }}"
                        class="card-img-top" alt="Besi Aluminium" style="max-width: 25%; max-height: 250px;">
                    <h4 class="fw-bold text-light fs-2 mt-3">{{ $content->title }}</h4>
                    <p class="text-light">{{ $content->description }}</p>
                </div>
            </div>
            @php $counter++; @endphp
            <!-- Tambahkan counter setelah setiap iterasi -->
            @endforeach
            @endforeach
        </div>

    </div>
</div>


<!-- Our Product Section -->
<div id="ourProduct" style="margin-bottom: 7em" data-aos="fade-up" class="mt-5">
    <h2 class="text-center fw-bold text-primary mb-5 position-relative fs-1">Our Product</h2>
    <section id="landingReviews" class=" bg-body landing-reviews ">
        <!-- What people say slider: Start -->
        <div class="container">
            <div class="row align-items-center gx-0 gy-4 g-lg-5">
                <div class="swiper-reviews-carousel overflow-hidden mb-5 pb-md-2 pb-md-3">

                    <div class="swiper" id="swiper-reviews">
                        <div class="swiper-wrapper">

                            @foreach($our_product as $key => $ourProduct)
                            @foreach($ourProduct->contents as $content)
                            <div class="swiper-slide">
                                <div class="card h-100">
                                    <a href="/assets/img/custom/file/catalogue_cgp.pdf" target="_blank">
                                        <div
                                            class="card-body text-body d-flex flex-column justify-content-between h-100">
                                            <img src="{{ asset('assets/img/custom/storage/product') . '/'. $content->image  }}"
                                                class="card-img-top" alt="Besi Aluminium"
                                                style="max-width: 100%; max-height: 250px; object-fit: cover;">
                                            <div class="card-body">
                                                <h5 class="card-title fw-bold fs-3">{{ $content->title }}</h5>
                                                <p class="card-text">{{ $content->description }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                            @endforeach


                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>

                    </div>
                    <button id="reviews-previous-btn" class="btn btn-label-primary reviews-btn reviews-prev-btn"
                        type="button">
                        <i class="ti ti-chevron-left ti-lg"></i>
                    </button>
                    <button id="reviews-next-btn" class="btn btn-label-primary reviews-btn reviews-next-btn"
                        type="button">
                        <i class="ti ti-chevron-right ti-lg"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Contact Us Section -->
<div id="contactUs" class="container mb-5" style="margin-bottom: 10em" data-aos="fade-up">
    <h2 class="text-center fw-bold text-primary mb-5 position-relative fs-1">{{ __('messages.contact_us_title') }}</h2>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="p-4 border rounded">

                @foreach($contact_us as $key => $contact)
                @foreach($contact->contents as $content)
                @if ($key < 3) <h5 class="fw-bold">{{ $content->title }}</h5>
                    <p>{{ $content->description }}</p>
                    @endif

                    @endforeach
                    @endforeach

            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="p-4 border rounded">
                @foreach($contact_us as $key => $contact)
                @foreach($contact->contents as $content)
                @if ($key > 2) <h5 class="fw-bold">{{ $content->title }}</h5>
                <p>{{ $content->description }}</p>
                @endif

                @endforeach
                @endforeach
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form id="contactForm" method="POST" class="border rounded p-4">
                @csrf
                <div class="mb-4 row">
                    <div class="col">
                        <label for="name" class="form-label fw-bold fs-5">{{ __('messages.name_label') }}</label>
                        <input type="text" class="form-control" id="name" placeholder="{{ __('messages.name_label') }}"
                            required>
                    </div>
                    <div class="col">
                        <label for="contact" class="form-label fw-bold fs-5">{{ __('messages.contact_label') }}</label>
                        <input type="number" class="form-control" id="contact"
                            placeholder="{{ __('messages.contact_label') }}" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="description" class="form-label fw-bold fs-5">{{ __('messages.description_label')
                        }}</label>
                    <textarea class="form-control" id="description" rows="4"
                        placeholder="{{ __('messages.description_label') }}" required></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100 p-3">{{ __('messages.submit_button') }}</button>
                </div>
            </form>

            <!-- Pesan Sukses -->
            <div id="successMessage" style="display:none;" class="alert alert-success mt-3">
                {{ __('messages.success_message') }}
            </div>

            <!-- Pesan Error -->
            <div id="errorMessage" style="display:none;" class="alert alert-danger mt-3">
                {{ __('messages.error_message') }}
            </div>

            <!-- Social Icons -->
            <div class="social-icons mt-4">
                @foreach($social_media as $social)
                <a href="{{ $social->link }}" class="social-icon" target="_blank">
                    <img src="{{ asset('assets/img/custom/icon-' . strtolower(str_replace([' ', '(', ')'], '', $social->title)) . '.webp') }}"
                        alt="{{ $social->title }}">
                </a>
                @endforeach
            </div>

        </div>
    </div>
</div>

@endsection

@push('scripts')


<script src="{{ asset('assets/js/front-page-landing.js') }}"></script>
<script>
    AOS.init({
        duration: 1500,
        easing: 'ease-in-out',
        once: true
    });

    $(document).ready(function() {
        $('#contactForm').on('submit', function(e) {
            e.preventDefault();
            $.LoadingOverlay("show", {
                image: "{{ asset('assets/img/custom/loading-spinner.gif') }}",
                background: "rgba(0, 0, 0, 0.5)"
            });

            $.ajax({
                url: "{{ route('smtp.send') }}",
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    name: $('#name').val(),
                    contact: $('#contact').val(),
                    description: $('#description').val()
                },
                success: function(response) {
                    $.LoadingOverlay("hide");
                    $('#successMessage').show();
                    $('#contactForm')[0].reset();
                },
                error: function(xhr) {
                    $.LoadingOverlay("hide");
                    $('#errorMessage').show();
                }
            });
        });
    });
</script>

@endpush