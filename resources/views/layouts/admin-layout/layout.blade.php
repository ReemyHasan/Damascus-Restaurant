@extends('layouts.admin-layout.master')

@section('body')

    <body data-sidebar="dark" data-sidebar-size="sm">
        @if (session('success'))
            <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1050;">
                <div id="successToast" class="toast align-items-center text-bg-success border-0" role="alert"
                    aria-live="assertive" aria-atomic="true" data-bs-delay="10000">
                    <div class="d-flex">
                        <div class="toast-body text-center">
                            <p>{{ session('success') }}</p>
                            <div class="progress mt-2" style="height: 5px;">
                                <div id="toastProgressBar" class="progress-bar bg-success" role="progressbar"
                                    style="width: 100%;" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif
        @if ($errors->any())
            @php
                $collection = collect($errors->all());
                $errors = $collection->unique();
            @endphp
            @foreach ($errors as $error)
            <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1050;">
                <div id="successToast" class="toast align-items-center text-bg-danger border-0" role="alert"
                    aria-live="assertive" aria-atomic="true" data-bs-delay="10000">
                    <div class="d-flex">
                        <div class="toast-body text-center">
                            <p>{{ json_encode(trans($error)) }}</p>
                            <div class="progress mt-2" style="height: 5px;">
                                <div id="toastProgressBar" class="progress-bar bg-danger" role="progressbar"
                                    style="width: 100%;" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    @endsection
