@extends('layouts.admin-layout.layout')
@section('title')
Categories List
@endsection
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div class="page-title-right d-flex align-items-center">

                <h4 class="mb-0">Categories</h4>

            </div>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') ?? url()->previous() }}">Categories List</a></li>
                    <li class="breadcrumb-item active">Categories</li>

                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->


<div class="row custome-temcategory">
    <div class="col-12">
        <div class="">
            <div class="card-body">
                <div class="row">

                    <div class="col d-flex align-items-center justify-content-start justify-content-md-end">
                        <button class="btn btn-info fw-bold waves-effect waves-light d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#categoryModal">
                             Add New <i class="uil-plus-circle ms-2" style="font-size:16px;"></i>
                        </button>

                        {{-- <a href="{{ route('admin.categories.create') }}">
                        <x-forms.button type="submit" id="addRoleBtn" :disabled="false" text="Add New" class="btn btn-info fw-bold waves-effect waves-light d-flex align-items-center" icon="uil-plus-circle ms-2" iconStyle="font-size:16px" slotPosition="right" />
                        </a> --}}
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="custome-table table mb-0">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>

                                <td>{{ $category->title }}</td>
                                <td>{!! $category->description !!}</td>
                                <td>
                                    <button class="btn btn-primary waves-effect waves-light edit-category-button"
                                     data-id="{{ $category->id }}"
                                      data-title="{{ $category->title }}"
                                       data-description="{{ $category->description }}">
                                        <i class="mdi mdi-pencil"></i>

                                    </button>
                                        <button data-id="{{ $category->id }}" class="btn btn-danger delete-button">
                                            <i class="mdi mdi-trash-can"></i>
                                        </button>
                                        <form id="delete-form-{{ $category->id }}" action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">No Categories Exists.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>
@include('admin.categories.Modal')
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Open Modal for Creating Category
        $('.btn-info').click(function() {
            $('#categoryModalLabel').text('Add Category');
            $('#categoryForm')[0].reset();
            $('#categoryId').val('');
        });

        // Open Modal for Editing Category
        $('.edit-category-button').click(function() {
            $('#categoryModalLabel').text('Edit Category');
            $('#categoryId').val($(this).data('id'));
            $('#title').val($(this).data('title'));
            $('#description').val($(this).data('description'));
            $('#categoryModal').modal('show');
        });

        $('#categoryForm').submit(function(e) {
            e.preventDefault();

            let id = $('#categoryId').val();
            let formData = $(this).serialize();
            let url = id ? `/admin/categories/${id}` : `/admin/categories`;
            let method = id ? 'POST' : 'POST';
            if (id) {
                formData += '&_method=PUT';
            }

            $.ajax({
                type: method
                , url: url
                , data: formData
                , success: function(response) {
                    $('#categoryModal').modal('hide');
                    localStorage.setItem('success', 'Category updated successfully!');

                    location.reload();
                }
                , error: function(xhr) {
                    if (xhr.status === 422) {
                        $.each(xhr.responseJSON.errors, function(field, messages) {
                            $("." + field + "_error").text(messages[0]);
                        });
                    }
                }
            });
        });

        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function() {
                const categoryId = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Are You Sure?'
                    , text: 'This will be permanently deleted.'
                    , icon: 'warning'
                    , showCancelButton: true
                    , confirmButtonColor: '#3085d6'
                    , cancelButtonColor: '#d33'
                    , confirmButtonText: 'Yes, Delete!'
                    , cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + categoryId).submit();
                    }
                });
            });
        });
    });

</script>
@endpush
