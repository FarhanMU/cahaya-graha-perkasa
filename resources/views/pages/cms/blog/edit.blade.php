@extends('components.layouts.cms.app')

@section('title', 'Edit Blog')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> <a
                href="{{ route('blog.index') }}">Blog</a> / Edit Blog</h4>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('blog.update', $blog->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <!-- Bahasa Inggris -->
                                <div class="col-lg-6 col-md-12">
                                    <div class="card mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0">Language Code <strong>en</strong></h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label class="form-label" for="title_en">Title (English)</label>
                                                <input type="text" id="title_en" class="form-control"
                                                    name="content[en][title]" placeholder="Enter title in English"
                                                    value="{{ old('content.en.title', $blog->contents['en']->title) }}"
                                                    required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="description_en">Description
                                                    (English)</label>
                                                <textarea id="description_en" class="form-control"
                                                    name="content[en][description]"
                                                    placeholder="Enter description in English"
                                                    required>{{ old('content.en.description', $blog->contents['en']->description) }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="image_en">Image (English)</label>
                                                <input type="file" id="image_en" class="form-control"
                                                    name="content[en][image]" />
                                                @if($blog->contents['en']->image)
                                                <img src="{{ asset('assets/img/custom/storage/blog/' . $blog->contents['en']->image) }}"
                                                    class="img-fluid mt-2 img-max-size"
                                                    alt="{{ $blog->contents['en']->title }}">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Bahasa Indonesia -->
                                <div class="col-lg-6 col-md-12">
                                    <div class="card mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0">Language Code <strong>id</strong></h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label class="form-label" for="title_id">Title (Indonesian)</label>
                                                <input type="text" id="title_id" class="form-control"
                                                    name="content[id][title]" placeholder="Enter title in Indonesian"
                                                    value="{{ old('content.id.title', $blog->contents['id']->title) }}"
                                                    required />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="description_id">Description
                                                    (Indonesian)</label>
                                                <textarea id="description_id" class="form-control"
                                                    name="content[id][description]"
                                                    placeholder="Enter description in Indonesian"
                                                    required>{{ old('content.id.description', $blog->contents['id']->description) }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="image_id">Image (Indonesian)</label>
                                                <input type="file" id="image_id" class="form-control"
                                                    name="content[id][image]" />
                                                @if($blog->contents['id']->image)
                                                <img src="{{ asset('assets/img/custom/storage/blog/' . $blog->contents['id']->image) }}"
                                                    class="img-fluid mt-2 img-max-size"
                                                    alt="{{ $blog->contents['id']->title }}">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')




<script>
    ClassicEditor
        .create(document.querySelector('#description_en'))
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#description_id'))
        .catch(error => {
            console.error(error);
        });
</script>


@endpush