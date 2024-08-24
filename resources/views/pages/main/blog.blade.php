@extends('components.layouts.main.app')

@section('content')
<!-- Jumbotron Section -->
<div class="jumbotron jumbotron-custom text-white" data-aos="fade-up">
    <div class="container-fluid custom-container">
        <div class="row align-items-center">
            <div class="col-md-6">
                @foreach($headers as $header)
                @foreach($header->contents->where('language', $language) as $content)
                <h1 class="display-4 fw-bold text-white">{{ $content->title }}</h1>
                <p class="lead text-white">{{ $content->description }}</p>
                @endforeach
                @endforeach
            </div>
            <div class="col-md-6 text-center">
                <img src="{{ asset('assets/img/custom/jumbotron-1.webp') }}" alt="Project Illustration"
                    class="img-fluid">
            </div>
        </div>
    </div>
</div>

<!-- Blog Section -->
<div class="mb-7" data-aos="fade-up">
    <h2 class="text-center fw-bold text-primary mb-5 position-relative fs-1">Blog</h2>
    <section id="blogSection" class="bg-body landing-reviews">
        <div class="container">
            <div class="row gx-4 gy-5" id="blog-container">
                @foreach($blog->take(10) as $blogContent)
                @foreach($blogContent->contents as $content)
                <div class="col-md-4 blog-item">
                    <a href="{{ route('blog.detail', $content->slug) }}">
                        <div class="card h-100">
                            <img src="{{ asset('assets/img/custom/storage/blog/' . $content->image) }}"
                                class="card-img-top" alt="{{ $content->title }}">
                            <div class="card-body">
                                <h5 class="card-title fw-bold fs-3">{{ $content->title }}</h5>
                                <p class="card-text">{{ $content->description }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                @endforeach
            </div>
            <div class="text-center mt-4">
                <button id="load-more" class="btn btn-primary">Load More</button>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
    let currentIndex = 10; // Initial number of items loaded
    const itemsPerLoad = 10; // Number of items loaded each time
    const blogData = @json($blog); // Convert blog data to a JavaScript array

    // Check on page load whether to hide the "Load More" button
    if (currentIndex >= blogData.length) {
        document.getElementById('load-more').style.setProperty('display', 'none', 'important');
    }

    document.getElementById('load-more').addEventListener('click', function() {
        const blogContainer = document.getElementById('blog-container');
        let itemsToLoad = blogData.slice(currentIndex, currentIndex + itemsPerLoad);

        itemsToLoad.forEach(blogContent => {
            blogContent.contents.forEach(content => {
                let newItem = `
                    <div class="col-md-4 blog-item">
                        <a href="{{ route('blog.detail', '') }}/${content.slug}">
                            <div class="card h-100">
                                <img src="{{ asset('assets/img/custom/storage/blog') }}/${content.image}" class="card-img-top" alt="${content.title}">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold fs-3">${content.title}</h5>
                                    <p class="card-text">${content.description}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                `;
                blogContainer.insertAdjacentHTML('beforeend', newItem);
            });
        });

        currentIndex += itemsPerLoad;

        // If all data is loaded, hide the "Load More" button
        if (currentIndex >= blogData.length) {
            this.style.setProperty('display', 'none', 'important');
        }
    });

    AOS.init({
        duration: 1500, // Animation duration in milliseconds
        easing: 'ease-in-out', // Animation easing
        once: true // Run animation only once
    });
</script>
@endpush