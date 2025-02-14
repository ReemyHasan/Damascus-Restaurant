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

@push('scripts')

<script>
  $(document).ready(function() {
    function submitForm(formId, buttonId, spinnerId) {
        $(document).on('submit', formId, function(e) {
            e.preventDefault();

            let form = $(this);
            let formData = form.serialize();
            let button = $(buttonId);
            let spinner = $(spinnerId);

            // Clear previous errors
            $(".error-text").text("");

            // Disable button and show spinner
            button.prop('disabled', true);
            spinner.removeClass('d-none');

            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: formData,
                dataType: "json",
                success: function(response) {
                    localStorage.setItem('success', 'Profile updated successfully!');
                    location.reload();
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        $.each(xhr.responseJSON.errors, function(field, messages) {
                            $("." + field + "_error").text(messages[0]);
                        });
                    }
                    button.prop('disabled', false);
                    spinner.addClass('d-none');
                }
            });
        });
    }



    // Apply to forms
    submitForm("#profileUpdateForm", "#saveProfileBtn", "#profileSpinner");
    submitForm("#passwordUpdateForm", "#updatePasswordBtn", "#passwordSpinner");
    submitForm("#deleteAccountForm", "#deleteAccountBtn", "#deleteSpinner");
});

</script>
@endpush
@endsection

