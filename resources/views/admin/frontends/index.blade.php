@extends('layouts.admin-layout.layout')
@section('title')
Home Page Content
@endsection
@push('css')
<style>
    .form-section {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }
    .section-title {
        background: #006d98;
        color: white;
        padding: 10px;
        border-radius: 5px;
        font-size: 18px;
    }
    .image-preview {
        max-width: 150px;
        max-height: 150px;
        border: 2px solid #ddd;
        border-radius: 10px;
        padding: 5px;
    }
</style>
@endpush
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
<div class="row custome-template custome-template-card card p-3">

    <form id="home-form" action="{{ route('admin.frontend.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Hero Section --}}
        <div class="mb-4 form-section">
            <h4 class="section-title">Hero Section</h4>
            <label>Title</label>
            <input type="text" name="hero_section[title]" class="form-control" value="{{ $frontends['hero_section']->values['title'] ?? '' }}">
            <div><span class="text-danger error-hero_section_title"></span></div>

            <label>Description</label>
            <input type="text" name="hero_section[description]" class="form-control" value="{{ $frontends['hero_section']->values['description'] ?? '' }}">
            <div><span class="text-danger error-hero_section_description"></span></div>

            <label>Image</label>
            <input type="file" name="hero_section[image]" class="form-control" id="heroImageInput">
            <div class="mt-2">
                <img id="heroImagePreview" src="{{ $frontends['hero_section']->image->url ?? '' }}" width="150" class="image-preview  mt-2" style="{{ $frontends['hero_section']->image ? '' : 'display: none;' }}">
            </div>
            <div><span class="text-danger error-hero_section_image"></span></div>

        </div>
        <hr style="font-weight: 600;">

        {{-- Contact Section --}}
        <div class="mb-4 form-section">
            <h4 class="section-title">Contact</h4>
            <label>Address</label>
            <input type="text" name="contact[address]" class="form-control" value="{{ $frontends['contact']->values['address'] ?? '' }}">
            <div><span class="text-danger error-contact_address"></span></div>

            <label>Phone</label>
            <input type="text" name="contact[phone]" class="form-control" value="{{ $frontends['contact']->values['phone'] ?? '' }}">
            <div><span class="text-danger error-contact_phone"></span></div>

            <label>Email</label>
            <input type="email" name="contact[email]" class="form-control" value="{{ $frontends['contact']->values['email'] ?? '' }}">
            <div><span class="text-danger error-contact_email"></span></div>

            <label>Location</label>
            <input type="text" name="contact[location]" class="form-control" value="{{ $frontends['contact']->values['location'] ?? '' }}">
            <div><span class="text-danger error-contact_location"></span></div>

        </div>
        <hr style="font-weight: 600;">

        {{-- Opening Hours --}}
        <div class="mb-4 form-section">
            <h4 class="section-title">Opening Hours</h4>
            <div id="openingHoursContainer">
                @foreach($frontends['opening_hours']->elements() as $index => $frontend)
                <div class="opening-hour-item mb-2 d-flex align-items-center">
                    <input type="text" name="opening_hours[{{ $index }}][date]" class="form-control me-2" value="{{ $frontend->values['date'] ?? '' }}" placeholder="Day (e.g., Monday - Friday)">
            <div><span class="text-danger error-opening_hours_{{$index}}_date"></span></div>

                    <input type="text" name="opening_hours[{{ $index }}][time]" class="form-control me-2" value="{{ $frontend->values['time'] ?? '' }}" placeholder="Time (e.g., 9AM - 5PM)">
            <div><span class="text-danger error-opening_hours_{{$index}}_time"></span></div>

                    <button type="button" class="btn btn-danger btn-sm remove-hour">X</button>
                </div>
                @endforeach
            </div>
            <button type="button" id="addOpeningHour" class="btn btn-success btn-sm mt-2">+ Add More</button>
        </div>
        <hr style="font-size: 400px;">

        {{-- Footer Links --}}
        <div class="mb-4 form-section">
            <h4 class="section-title">Footer Links</h4>
            <label>Title</label>
            <input type="text" name="footer_link[title]" class="form-control" value="{{ $frontends['footer_link']->values['title'] ?? '' }}">
            <div><span class="text-danger error-footer_link_title"></span></div>

            <label>Link</label>
            <input type="text" name="footer_link[link]" class="form-control" value="{{ $frontends['footer_link']->values['link'] ?? '' }}">
            <div><span class="text-danger error-footer_link_link"></span></div>

            <label>Link Target</label>
            <select name="footer_link[link_target]" class="form-control">
                <option value="_self" {{ ($frontends['footer_link']->values['link_target'] ?? '') == '_self' ? 'selected' : '' }}>Same Tab</option>
                <option value="_blank" {{ ($frontends['footer_link']->values['link_target'] ?? '') == '_blank' ? 'selected' : '' }}>New Tab</option>
            </select>
            <div><span class="text-danger error-footer_link_link_target"></span></div>

        </div>
        <hr style="font-weight: 600;">


        {{-- Hero Section --}}
        <div class="mb-4 form-section">
            <h4 class="section-title">SEO Date</h4>
            <label>Title</label>
            <input type="text" name="seo_data[title]" class="form-control" value="{{ $frontends['seo_data']->values['title'] ?? '' }}">
            <div><span class="text-danger error-seo_data_title"></span></div>

            <label>Description</label>
            <input type="text" name="seo_data[description]" class="form-control" value="{{ $frontends['seo_data']->values['description'] ?? '' }}">
            <div><span class="text-danger error-seo_data_description"></span></div>

            <label>Keywords</label>
            <input type="text" name="seo_data[keywords]" class="form-control" value="{{ $frontends['seo_data']->values['keywords'] ?? '' }}">
            <div><span class="text-danger error-seo_data_keywords"></span></div>

            <label>Image</label>
            <input type="file" name="seo_data[image]" class="form-control" id="SEOInput">
            <div class="mt-2">
                <img id="SEOPreview" src="{{ $frontends['seo_data']->image->url ?? '' }}" width="150" class="image-preview mt-2" style="{{ $frontends['seo_data']->image ? '' : 'display: none;' }}">
            </div>
            <div><span class="text-danger error-seo_data_image"></span></div>

        </div>

        <button type="submit" class="btn btn-primary" id="submitButton">
            <span class="spinner-border spinner-border-sm d-none" id="spinner"></span>
            Save Changes</button>
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


    $(document).ready(function() {
        $('#home-form').on('submit', function(event) {
            event.preventDefault();

            let formData = new FormData(this);
            let url = "{{ route('admin.frontend.update') }}";
            let method = "POST";
            let button = $("#submitButton");
            let spinner = $("#spinner");

            // Clear previous errors
            $(".error-text").text("");

            // Disable button and show spinner
            button.prop('disabled', true);
            spinner.removeClass('d-none');



            $.ajax({
                url: url,
                type: method,
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('button[type="submit"]').prop('disabled', true);
                },
                success: function(response) {
                    $('#success-message').text(response.message).removeClass('d-none');
                    localStorage.setItem('success', 'Home page data Saved successfully!');
                    window.location.href = "/admin/frontend";
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        console.log("errors: "+errors);
                        $.each(xhr.responseJSON.errors, function(field, messages) {
                            $(".error-"+ field.replace('.', '_')).text(messages[0]);
                        });
                    }

                    button.prop('disabled', false);
                    spinner.addClass('d-none');
                },
                complete: function() {
                    $('button[type="submit"]').prop('disabled', false);
                }
            });
        });
    });

</script>
@endpush
