@extends('components.layouts.cms.app')

@section('title', 'Create Why Us Content')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Beranda/</span> <a
                href="{{ route('whyUs.index') }}">WhyUs</a> /Create</h4>

        <!-- Card utama yang membungkus semua konten -->
        <div class="card">
            <div class="card-body">
                <!-- Form untuk menambahkan Why Us content dalam dua bahasa -->
                <form action="{{ route('whyUs.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <!-- Bahasa Inggris -->
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0 fw-normal">Language Code <b>en</b></h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="title-en">Title (English)</label>
                                        <input type="text" id="title-en" class="form-control" name="title_en" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="description-en">Description (English)</label>
                                        <textarea id="description-en" class="form-control"
                                            name="description_en"></textarea>
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
                                        <input type="text" id="title-id" class="form-control" name="title_id" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="description-id">Description (Indonesian)</label>
                                        <textarea id="description-id" class="form-control"
                                            name="description_id"></textarea>
                                    </div>
                                    <input type="hidden" name="language_id" value="id">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Save di bagian bawah card utama -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection