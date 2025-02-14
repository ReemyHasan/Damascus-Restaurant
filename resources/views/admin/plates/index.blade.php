@extends('layouts.admin-layout.layout')
@section('title')
    Plates List
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
                    <li class="breadcrumb-item active">Plates</li>

                </ol>
            </div>

        </div>
    </div>
</div>

    <div class="row custome-template">
        <div class="col-12">
            <div class="">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('admin.plates.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search by Title or Category"
                                           value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="mdi mdi-magnify"></i> Search
                                    </button>

                                </div>
                            </form>
                        </div>
                            <div class="col d-flex align-items-center justify-content-start justify-content-md-end">
                                <a href="{{ route('admin.plates.create') }}">
                                    <x-forms.button type="submit" id="addRoleBtn" :disabled="false" text="Add New"
                                        class="btn btn-info fw-bold waves-effect waves-light d-flex align-items-center"
                                        icon="uil-plus-circle ms-2" iconStyle="font-size:16px" slotPosition="right" />
                                </a>
                            </div>



                    </div>

                    <div class="table-responsive">
                        <table class="custome-table table mb-0">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($plates as $plate)
                                    <tr>
                                        <td>{{ $plate->id }}</td>
                                        <td>
                                            <img src="{{ $plate?->image?->url }}"
                                             width="100" alt="{{$plate->title}}">
                                        </td>
                                        <td>{{ $plate->title }}</td>
                                        <td>{!! $plate->category->title !!}</td>
                                        <td>
                                                <a href="{{ route('admin.plates.edit', $plate) }}">
                                                    <x-forms.button type="button"
                                                        class="btn btn-primary waves-effect waves-light edit-plate-button"
                                                        icon="mdi mdi-book-edit" />
                                                </a>

                                                <button data-id="{{ $plate->id }}" class="btn btn-danger delete-button">
                                                    <i class="mdi mdi-trash-can"></i>
                                                </button>
                                                <form id="delete-form-{{ $plate->id }}" action="{{ route('admin.plates.destroy', $plate) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <a href="{{ route('admin.plates.show', $plate) }}">
                                                    <x-forms.button type="button"
                                                        class="btn btn-outline-primary waves-effect waves-light"
                                                        icon="mdi mdi-eye-circle" />
                                                </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No Plates Exists.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-area mt-15 mb-50">
                        <nav aria-label="Page navigation example">
                            {{ $plates->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function() {
                const plateId = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Are You Sure?',
                    text: 'This will be permanently deleted.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Delete!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + plateId).submit();
                    }
                });
            });
        });
    });
</script>
@endpush
