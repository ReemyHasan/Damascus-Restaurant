@extends('layouts.admin-layout.layout')

@section('title', 'Plate Details')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Plate Details</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.plates.index') }}">Plates List</a></li>
                    <li class="breadcrumb-item active">Plate Details</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-lg-12 mx-auto">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h4 class="card-title">Plate Information</h4>
                    <a href="{{ route('admin.plates.index') }}" class="btn btn-info fw-bold waves-effect waves-light">
                        <i class="uil-arrow-left me-1"></i> Back
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th width="30%">Title</th>
                                <td>{{ $plate->title ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>{{ $plate->category->title ?? 'Uncategorized' }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{!! $plate->description ?? 'No description available' !!}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>{{ $plate->price }}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td>
                                    @if(isset($plate->image))
                                        <img src="{{ $plate->image->url }}" class="img-thumbnail" width="150">
                                    @else
                                        <span class="text-muted">No image available</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
