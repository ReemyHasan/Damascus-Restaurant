@extends('layouts.admin-layout.layout')
@section('title')
{{ isset($plate) ? 'Edit Plate' : 'Create Plate' }}
@endsection
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div class="page-title-right d-flex align-items-center">
                <h4 class="mb-0">Plates</h4>
            </div>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.plates.index') ?? url()->previous() }}">Plates List</a></li>
                    <li class="breadcrumb-item active">{{ isset($plate) ? 'Edit Plate' : 'Create Plate' }}</li>

                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->


<div class="row custome-template">
    <div class="col-12">
        <div class="row mb-3">
            <div class="col d-flex align-items-center justify-content-end">
                <a href="{{ route('admin.plates.index') }}" style="width:100px" class="btn btn-info fw-bold waves-effect waves-light d-flex align-items-center">
                    <i style="font-size:18px" class="uil-arrow-left me-2"></i> Back
                </a>
            </div>
        </div>
        <div class="add-element p-3">
            <form action="{{ isset($plate) ? route('admin.plates.update', $plate) : route('admin.plates.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @isset($plate)
                @method('PUT')
                @endisset

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $plate->title ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-control" id="category_id" name="category_id" required>
                        <option value="">Select a Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ (old('category_id', $plate->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $plate->description ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $plate->price ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage(event)">

                    <!-- Image Preview -->
                    <div class="mt-3">
                        @if(isset($plate) && $plate->image)
                        <img id="imagePreview" src="{{ $plate->image->url }}" class="img-thumbnail" width="150">
                        @else
                        <img id="imagePreview" class="img-thumbnail d-none" width="150">
                        @endif
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">{{ isset($plate) ? 'Update' : 'Create' }}</button>
                <a href="{{ route('admin.plates.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function previewImage(event) {
        let reader = new FileReader();
        reader.onload = function() {
            let img = document.getElementById('imagePreview');
            img.src = reader.result;
            img.classList.remove('d-none');
        };
        reader.readAsDataURL(event.target.files[0]);
    }

</script>
@endpush
