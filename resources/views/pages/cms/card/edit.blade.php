@extends('components.layouts.cms.app')

@section('title', 'Edit Card')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> <a
                href="{{ route('card.index') }}">Card</a> / Edit Card</h4>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Card</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('card.update', $card->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" id="name" class="form-control" name="name"
                                    value="{{ old('name', $card->name) }}" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="position">Position</label>
                                <input type="text" id="position" class="form-control" name="position"
                                    value="{{ old('position', $card->position) }}" required />
                            </div>
                            <hr>

                            <!-- Card Content Inputs -->
                            <h5 class="mb-4">Card Contents</h5>

                            @foreach ($card->contents as $content)
                            @if ($content->title == 'WhatsApp')
                            <div class="mb-3">
                                <label class="form-label" for="whatsapp">WhatsApp</label>
                                <input type="text" id="whatsapp" class="form-control" name="content[whatsapp]"
                                    value="{{ old('content.whatsapp', $content->description) }}" />
                            </div>
                            @elseif ($content->title == 'Email')
                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" id="email" class="form-control" name="content[email]"
                                    value="{{ old('content.email', $content->description) }}" />
                            </div>
                            @elseif ($content->title == 'Instagram')
                            <div class="mb-3">
                                <label class="form-label" for="instagram">Instagram</label>
                                <input type="text" id="instagram" class="form-control" name="content[instagram]"
                                    value="{{ old('content.instagram', $content->description) }}" />
                            </div>
                            @elseif ($content->title == 'TikTok')
                            <div class="mb-3">
                                <label class="form-label" for="tiktok">TikTok</label>
                                <input type="text" id="tiktok" class="form-control" name="content[tiktok]"
                                    value="{{ old('content.tiktok', $content->description) }}" />
                            </div>
                            @elseif ($content->title == 'Facebook')
                            <div class="mb-3">
                                <label class="form-label" for="facebook">Facebook</label>
                                <input type="text" id="facebook" class="form-control" name="content[facebook]"
                                    value="{{ old('content.facebook', $content->description) }}" />
                            </div>
                            @endif
                            @endforeach

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection