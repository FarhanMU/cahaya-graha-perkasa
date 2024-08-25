@extends('components.layouts.cms.app')

@section('title', 'Create Why Us Content')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Beranda/</span> <a
                href="{{ route('ourProduct.index') }}">Our Product</a> /Create</h4>

        <!-- Menampilkan pesan sukses -->
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Form untuk menambahkan Our Product content dalam dua bahasa -->
        <div class="row">
            <!-- Bahasa Inggris -->
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-normal">Language Code <b>en</b></h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('ourProduct.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="title-en">Title (English)</label>
                                <input type="text" id="title-en" class="form-control" name="title_en"
                                    value="{{ old('title_en') }}" />
                                @if ($errors->has('title_en'))
                                <span class="text-danger">{{ $errors->first('title_en') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description-en">Description (English)</label>
                                <textarea id="description-en" class="form-control"
                                    name="description_en">{{ old('description_en') }}</textarea>
                                @if ($errors->has('description_en'))
                                <span class="text-danger">{{ $errors->first('description_en') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="image-en">Image (English)</label>
                                <input type="file" id="image-en" class="form-control" name="image_en" />
                                @if ($errors->has('image_en'))
                                <span class="text-danger">{{ $errors->first('image_en') }}</span>
                                @endif
                            </div>
                            <input type="hidden" name="language_en" value="en">
                    </div>
                </div>
            </div>

            <!-- Bahasa Indonesia -->
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-normal">Language Code <b>id</b></h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="title-id">Title (Indonesian)</label>
                            <input type="text" id="title-id" class="form-control" name="title_id"
                                value="{{ old('title_id') }}" />
                            @if ($errors->has('title_id'))
                            <span class="text-danger">{{ $errors->first('title_id') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="description-id">Description (Indonesian)</label>
                            <textarea id="description-id" class="form-control"
                                name="description_id">{{ old('description_id') }}</textarea>
                            @if ($errors->has('description_id'))
                            <span class="text-danger">{{ $errors->first('description_id') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="image-id">Image (Indonesian)</label>
                            <input type="file" id="image-id" class="form-control" name="image_id" />
                            @if ($errors->has('image_id'))
                            <span class="text-danger">{{ $errors->first('image_id') }}</span>
                            @endif
                        </div>
                        <input type="hidden" name="language_id" value="id">
                        <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection