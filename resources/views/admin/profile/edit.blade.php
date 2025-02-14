@extends('layouts.admin-layout.layout')
@section('title')
    Profile
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div class="page-title-right d-flex align-items-center">

                    <a href="{{ route('admin.plates.index') }}" class="btn btn-info fw-bold waves-effect waves-light me-2">
                        <i style="font-size:18px" class="uil-arrow-left me-1"></i> Back
                    </a>
                <h4 class="mb-0">Profile</h4>
            </div>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.profile.edit') ?? url()->previous() }}">Profile List</a></li>
                    <li class="breadcrumb-item active">Profile</li>

                </ol>
            </div>

        </div>
    </div>
</div>

    <div class="row">
        <div class="col-md-12">

            @include('admin.profile.partials.update-profile-information-form')
        </div>
        <div class="col-md-12">

            @include('admin.profile.partials.update-password-form')

        </div>
        <div class="col-md-12">

            @include('admin.profile.partials.delete-user-form')
        </div>

    </div>
@endsection
