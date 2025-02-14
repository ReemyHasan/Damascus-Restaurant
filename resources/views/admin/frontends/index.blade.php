@extends('layouts.admin-layout.layout')
@section('title')
Home Page Content
@endsection
@section('css')
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div class="page-title-right d-flex align-items-center">


                <h4 class="mb-0">Home Page Content</h4>
            </div>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.frontend.index') ?? url()->previous() }}">Home Page List</a></li>
                    <li class="breadcrumb-item active">Home Page Content</li>

                </ol>
            </div>

        </div>
    </div>
</div>
<hr>
<div class="row custome-template custome-template-card card p-3">

    <form action="{{ route('admin.frontend.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Hero Section --}}
        <div class="mb-4">
            <h4>Hero Section</h4>
            <label>Title</label>
            <input type="text" name="hero_section[title]" class="form-control" value="{{ $frontends['hero_section']->values['title'] ?? '' }}">

            <label>Description</label>
            <input type="text" name="hero_section[description]" class="form-control" value="{{ $frontends['hero_section']->values['description'] ?? '' }}">

            <label>Image</label>
            <input type="file" name="hero_section[image]" class="form-control" id="heroImageInput">
            <div class="mt-2">
                <img id="heroImagePreview" src="{{ $frontends['hero_section']->image->url ?? '' }}" width="150" class="rounded border p-1" style="{{ $frontends['hero_section']->image ? '' : 'display: none;' }}">
            </div>
        </div>
        <hr style="font-weight: 600;">

        {{-- Contact Section --}}
        <div class="mb-4">
            <h4>Contact</h4>
            <label>Address</label>
            <input type="text" name="contact[address]" class="form-control" value="{{ $frontends['contact']->values['address'] ?? '' }}">

            <label>Phone</label>
            <input type="text" name="contact[phone]" class="form-control" value="{{ $frontends['contact']->values['phone'] ?? '' }}">

            <label>Email</label>
            <input type="email" name="contact[email]" class="form-control" value="{{ $frontends['contact']->values['email'] ?? '' }}">

            <label>WhatsApp</label>
            <input type="text" name="contact[whatsapp]" class="form-control" value="{{ $frontends['contact']->values['whatsapp'] ?? '' }}">
        </div>
        <hr style="font-weight: 600;">

        {{-- Opening Hours --}}
        <div class="mb-4">
            <h4>Opening Hours</h4>
            <div id="openingHoursContainer">
                @foreach($frontends['opening_hours']->elements() as $index => $frontend)
                <div class="opening-hour-item mb-2 d-flex align-items-center">
                    <input type="text" name="opening_hours[{{ $index }}][date]" class="form-control me-2" value="{{ $frontend->values['date'] ?? '' }}" placeholder="Day (e.g., Monday - Friday)">
                    <input type="text" name="opening_hours[{{ $index }}][time]" class="form-control me-2" value="{{ $frontend->values['time'] ?? '' }}" placeholder="Time (e.g., 9AM - 5PM)">
                    <button type="button" class="btn btn-danger btn-sm remove-hour">X</button>
                </div>
                @endforeach
            </div>
            <button type="button" id="addOpeningHour" class="btn btn-success btn-sm mt-2">+ Add More</button>
        </div>
        <hr style="font-size: 400px;">

        {{-- Footer Links --}}
        <div class="mb-4">
            <h4>Footer Links</h4>
            <label>Title</label>
            <input type="text" name="footer_link[title]" class="form-control" value="{{ $frontends['footer_link']->values['title'] ?? '' }}">

            <label>Link</label>
            <input type="text" name="footer_link[link]" class="form-control" value="{{ $frontends['footer_link']->values['link'] ?? '' }}">

            <label>Link Target</label>
            <select name="footer_link[link_target]" class="form-control">
                <option value="_self" {{ ($frontends['footer_link']->values['link_target'] ?? '') == '_self' ? 'selected' : '' }}>Same Tab</option>
                <option value="_blank" {{ ($frontends['footer_link']->values['link_target'] ?? '') == '_blank' ? 'selected' : '' }}>New Tab</option>
            </select>
        </div>
        <hr style="font-weight: 600;">


        {{-- Hero Section --}}
        <div class="mb-4">
            <h4>SEO Date</h4>
            <label>Title</label>
            <input type="text" name="seo_data[title]" class="form-control" value="{{ $frontends['seo_data']->values['title'] ?? '' }}">

            <label>Description</label>
            <input type="text" name="seo_data[description]" class="form-control" value="{{ $frontends['seo_data']->values['description'] ?? '' }}">
            <label>Keywords</label>
            <input type="text" name="seo_data[keywords]" class="form-control" value="{{ $frontends['seo_data']->values['keywords'] ?? '' }}">
            <label>Image</label>
            <input type="file" name="seo_data[image]" class="form-control" id="SEOInput">
            <div class="mt-2">
                <img id="SEOPreview" src="{{ $frontends['seo_data']->image->url ?? '' }}" width="150" class="rounded border p-1" style="{{ $frontends['seo_data']->image ? '' : 'display: none;' }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
    {{-- </div> --}}

</div>

@endsection
@push('scripts')
<script>
    document.getElementById('heroImageInput').addEventListener('change', function(event) {
        let reader = new FileReader();
        reader.onload = function() {
            let img = document.getElementById('heroImagePreview');
            img.src = reader.result;
            img.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    });

    document.getElementById('SEOInput').addEventListener('change', function(event) {
        let reader = new FileReader();
        reader.onload = function() {
            let img = document.getElementById('SEOPreview');
            img.src = reader.result;
            img.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    });

    document.addEventListener('DOMContentLoaded', function() {
        let container = document.getElementById('openingHoursContainer');
        let addButton = document.getElementById('addOpeningHour');
        let hourIndex = {{count($frontends->filter(fn($f, $k) => Str::startsWith($k, 'opening_hours.element')))}};

        addButton.addEventListener('click', function() {
            let newRow = document.createElement('div');
            newRow.classList.add('opening-hour-item', 'mb-2', 'd-flex', 'align-items-center');
            newRow.innerHTML = `
                <input type="text" name="opening_hours[${hourIndex}][date]" class="form-control me-2" placeholder="Day (e.g., Monday - Friday)">
                <input type="text" name="opening_hours[${hourIndex}][time]" class="form-control me-2" placeholder="Time (e.g., 9AM - 5PM)">
                <button type="button" class="btn btn-danger btn-sm remove-hour">X</button>
            `;
            container.appendChild(newRow);
            hourIndex++;
        });

        container.addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-hour')) {
                event.target.parentElement.remove();
            }
        });
    });

</script>
@endpush
