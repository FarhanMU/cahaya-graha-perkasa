@extends('components.layouts.main.app')

@section('content')

<style>
    html,
    body {
        height: 100%;
        margin: 0;
        overflow: hidden;
    }

    h1.display-4 {
        font-size: 2vw;
        line-height: 1.2;
    }

    .text-dark-color {
        color: #333;
    }


    .social-icon {
        background-color: #0e1750;
        border-radius: 50%;
        padding: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 3.5vw;
        height: 3.5vw;
    }

    .social-icon img {
        width: 1.5vw;
        height: 1.5vw;
    }
</style>

<!-- id Card Section -->
<div class="jumbotron jumbotron-custom-id-card text-white position-relative" style="height: 100vh;">

    {{-- left position --}}
    <div class="position-absolute" style="top:5vh; left:8vw; width:100%">
        <div class=" d-flex align-items-center justify-content-start">
            <img src="{{ asset('assets/img/custom/icon.webp') }}" alt="Company Logo" class="img-fluid"
                style="max-height: 20vh; margin-right:5%">
            <h1 class="display-4 fw-bold text-white">PT. Cahaya Graha Perkasa</h1>
        </div>
    </div>
    <div class="position-absolute" style="top:40vh; left:8vw; width:100%">
        <div class=" d-flex align-items-center justify-content-start">
            <h1 class="display-4 fw-bold text-white">{{ $card->name }}</h1>
        </div>
        <div class="bottom-line"></div>
        <div class=" d-flex align-items-center justify-content-start mt-3">
            <h1 class="display-4 fw-bold text-white">{{ $card->position }}</h1>
        </div>
    </div>

    @foreach($card->contents as $key => $content)
    @if ($key == 0)
    <div class="position-absolute" style="top:80vh; left:4vw; width:100%">
        <div class=" d-flex align-items-center justify-content-start">
            <div class="social-icons">
                <a href="#" class="social-icon">
                    <img src="{{ asset('assets/img/custom/icon-whatsapp-white.webp') }}" alt="WhatsApp">
                </a>
            </div>
            <h1 class="display-4 fw-bold text-dark-color ms-5"
                style="margin: 0; line-height: 1.2; vertical-align: middle;">{{ $content->description }}</h1>
        </div>
    </div>
    @endif

    @endforeach


    @foreach($card->contents as $key => $content)
    @if ($key == 1)
    <div class="position-absolute" style="top:90vh; left:4vw; width:100%">
        <div class=" d-flex align-items-center justify-content-start">
            <div class="social-icons">
                <a href="#" class="social-icon">
                    <img src="{{ asset('assets/img/custom/icon-email-white.webp') }}" alt="email">
                </a>
            </div>
            <h1 class="display-4 fw-bold text-dark-color ms-5"
                style="margin: 0; line-height: 1.2; vertical-align: middle;">{{ $content->description }}</h1>
        </div>
    </div>
    @endif

    @endforeach



    {{-- right position --}}
    @foreach($card->contents as $key => $content)
    @if ($key == 2)
    <div class="position-absolute" style="top:70vh; left:60vw; width:100%">
        <div class=" d-flex align-items-center justify-content-start">
            <div class="social-icons">
                <a href="#" class="social-icon">
                    <img src="{{ asset('assets/img/custom/icon-instagram-white.webp') }}" alt="instagram">
                </a>
            </div>
            <h1 class="display-4 fw-bold text-dark-color ms-5"
                style="margin: 0; line-height: 1.2; vertical-align: middle;">{{ $content->description }}</h1>
        </div>
    </div>
    @endif

    @endforeach


    @foreach($card->contents as $key => $content)
    @if ($key == 3)
    <div class="position-absolute" style="top:80vh; left:60vw; width:100%">
        <div class=" d-flex align-items-center justify-content-start">
            <div class="social-icons">
                <a href="#" class="social-icon">
                    <img src="{{ asset('assets/img/custom/icon-tiktok-white.webp') }}" alt="tiktok">
                </a>
            </div>
            <h1 class="display-4 fw-bold text-dark-color ms-5"
                style="margin: 0; line-height: 1.2; vertical-align: middle;">{{ $content->description }}</h1>
        </div>
    </div>
    @endif

    @endforeach


    @foreach($card->contents as $key => $content)
    @if ($key == 3)

    <div class="position-absolute" style="top:90vh; left:60vw; width:100%">
        <div class=" d-flex align-items-center justify-content-start">
            <div class="social-icons">
                <a href="#" class="social-icon">
                    <img src="{{ asset('assets/img/custom/icon-facebook-white.webp') }}" alt="facebook">
                </a>
            </div>
            <h1 class="display-4 fw-bold text-dark-color ms-5"
                style="margin: 0; line-height: 1.2; vertical-align: middle;">{{ $content->description }}</h1>
        </div>
    </div>
    @endif

    @endforeach



</div>

@endsection

@push('scripts')

@endpush