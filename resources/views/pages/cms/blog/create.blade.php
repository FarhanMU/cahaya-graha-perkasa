@extends('components.layouts.cms.app')

@section('title', 'Create Card')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> <a
                href="{{ route('card.index') }}">Blog</a> / Create Card</h4>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Create New Card</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('card.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}"
                                    required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="position">Position</label>
                                <input type="text" id="position" class="form-control" name="position"
                                    value="{{ old('position') }}" required />
                            </div>
                            <hr>

                            <!-- Card Content Inputs -->
                            <h5 class="mb-4">Card Contents</h5>

                            <div class="mb-3">
                                <label class="form-label" for="whatsapp">WhatsApp</label>
                                <input type="text" id="whatsapp" class="form-control" name="content[whatsapp]"
                                    placeholder="Enter WhatsApp number" value="{{ old('content.whatsapp') }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" id="email" class="form-control" name="content[email]"
                                    placeholder="Enter Email" value="{{ old('content.email') }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="instagram">Instagram</label>
                                <input type="text" id="instagram" class="form-control" name="content[instagram]"
                                    placeholder="Enter Instagram username" value="{{ old('content.instagram') }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tiktok">TikTok</label>
                                <input type="text" id="tiktok" class="form-control" name="content[tiktok]"
                                    placeholder="Enter TikTok username" value="{{ old('content.tiktok') }}" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="facebook">Facebook</label>
                                <input type="text" id="facebook" class="form-control" name="content[facebook]"
                                    placeholder="Enter Facebook profile" value="{{ old('content.facebook') }}" />
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection