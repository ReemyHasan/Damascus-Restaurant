<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('/assets/css/bootstrap.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ URL::asset('/assets/css/icons.css')}}" id="icons-style" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ URL::asset('/assets/css/app.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/css/new-style.css')}}"  rel="stylesheet" type="text/css" />
    <!-- dropzone -->
    @stack('css')


  <!-- DataTables -->
  <link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css') }}" rel="stylesheet" />


  <style>
      .submenu-icon {
          margin-right: 8px;
          font-size: 14px;
          vertical-align: middle;
      }

      .submenu-item {
          display: flex;
          align-items: center;
          padding: 8px 15px;
          transition: background-color 0.3s;
      }

      .submenu-item:hover {
          background-color: #f0f0f0;
      }

      .submenu-item a {
          display: flex;
          align-items: center;
          color: #333;
          text-decoration: none;
      }

      .submenu-item a:hover {
          color: #007bff;
      }
      </style>

<script>
        document.addEventListener('DOMContentLoaded', function () {
        var toastElements = document.querySelectorAll('.toast');
        toastElements.forEach(function(toastElement) {
            var toast = new bootstrap.Toast(toastElement);
            toast.show();

            var progressBar = toastElement.querySelector('.progress-bar');
            var displayTime = 1000;
            var intervalTime = 100;
            var totalIntervals = displayTime / intervalTime;
            var intervalCount = 0;

            var progressInterval = setInterval(function () {
                intervalCount++;
                var percentage = 100 - (intervalCount / totalIntervals) * 100;
                progressBar.style.width = percentage + '%';

                if (percentage <= 0) {
                    clearInterval(progressInterval);
                }
            }, intervalTime);
        });
    });

document.addEventListener('DOMContentLoaded', function() {
    let successMessage = localStorage.getItem('success');
    if (successMessage) {
        // Show the success message as a Bootstrap toast
        let toastContainer = document.createElement('div');
        toastContainer.innerHTML = `
        <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1050;">
                <div id="successToast" class="toast align-items-center text-bg-success border-0" role="alert"
                    aria-live="assertive" aria-atomic="true" data-bs-delay="10000">
                    <div class="d-flex">
                        <div class="toast-body text-center">
                            <p>${successMessage}</p>
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
            `;
        document.body.appendChild(toastContainer);

        var toastElement = toastContainer.querySelector('.toast');
        var toast = new bootstrap.Toast(toastElement);
        toast.show();

        var progressBar = toastElement.querySelector('.progress-bar');
            var displayTime = 1000;
            var intervalTime = 100;
            var totalIntervals = displayTime / intervalTime;
            var intervalCount = 0;

            var progressInterval = setInterval(function () {
                intervalCount++;
                var percentage = 100 - (intervalCount / totalIntervals) * 100;
                progressBar.style.width = percentage + '%';

                if (percentage <= 0) {
                    clearInterval(progressInterval);
                }
            }, intervalTime);
            
        localStorage.removeItem('success');
    }
});

    </script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</head>

@section('body')

    <body>
    @show

    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('layouts.admin-layout.topbar')
        @include('layouts.admin-layout.sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>

        </div>
        <!-- end main content-->
    </div>

    <!-- JAVASCRIPT -->
 <script src="{{ URL::asset('/assets/libs/jquery/jquery.min.js')}}"></script>
 <script src="{{ URL::asset('/assets/libs/bootstrap/bootstrap.min.js')}}"></script>
 <script src="{{ URL::asset('/assets/libs/metismenu/metismenu.min.js')}}"></script>
 <script src="{{ URL::asset('/assets/libs/simplebar/simplebar.min.js')}}"></script>
 <script src="{{ URL::asset('/assets/libs/node-waves/node-waves.min.js')}}"></script>
 <script src="{{ URL::asset('/assets/libs/waypoints/waypoints.min.js')}}"></script>
 <script src="{{ URL::asset('/assets/libs/jquery-counterup/jquery-counterup.min.js')}}"></script>

 @yield('script')

 <!-- App js -->
 <script src="{{ URL::asset('/assets/js/app.min.js')}}"></script>
<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>

<!-- Sweet Alerts js -->
<script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Range slider init js-->
<script src="{{ URL::asset('/assets/js/pages/sweet-alerts.init.js') }}"></script>
<!-- Magnific Popup-->
<script src="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.js') }}"></script>
<!-- lightbox init js-->
<script src="{{ URL::asset('/assets/js/pages/lightbox.init.js') }}"></script>
<!-- Varying Modal Content js -->
<script src="{{ URL::asset('assets/js/pages/modal.init.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/ckeditor/ckeditor.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/tinymce/tinymce.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/form-editor.init.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>

<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/spectrum-colorpicker/spectrum-colorpicker.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/datepicker/datepicker.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js') }}"></script>

 @stack('scripts')

</body>

</html>
