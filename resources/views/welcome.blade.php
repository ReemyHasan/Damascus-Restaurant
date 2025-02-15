<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{$frontends['seo_data']->values['title']}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="{{$frontends['seo_data']->values['keywords']}}" name="keywords">
    <meta content="{{$frontends['seo_data']->values['description']}}" name="description">


    <meta property="og:title" content="{{ $frontends['seo_data']->values['title'] }}">
    <meta property="og:description" content="{{ $frontends['seo_data']->values['description'] }}">
    <meta property="og:image" content="{{ $frontends['seo_data']->image->webp ?? $frontends['hero_section']->image->url }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ $frontends['seo_data']->values['title'] }}">

    <!-- Favicon -->
    <link href="{{asset("favicon.ico")}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset("website/css/bootstrap.min.css")}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset("website/css/style.css")}}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <div class="container-xxl hero-header mb-5">
                <div class="container">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <img class="logo" src="{{asset("website/img/Logo-Damaskus.png")}}" alt="Logo">
                            <h1 class="display-7 animated slideInLeft text-white">{{$frontends['hero_section']->values['title']}}</h1>
                            <p class="animated slideInLeft mb-4 pb-2">{{$frontends['hero_section']->values['description']}}</p>
                        </div>
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                            <img style="border-radius: 50%;" class="img-fluid" src="{{$frontends['hero_section']->image->webp ?? $frontends['hero_section']->image->url}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Menu Start -->

        <div class="menu-list container py-5">
            <div class="accordion" id="accordionMenu">
            </div>
        </div>
        <!-- Menu End -->
        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-6 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                        @if (isset($frontends['contact']->values['address']) && $frontends['contact']->values['address'] !="")

                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{ $frontends['contact']->values['address'] ?? '' }}</p>

                        @endif

                        @if (isset($frontends['contact']->values['phone']) && $frontends['contact']->values['phone'] !="")

                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{ $frontends['contact']->values['phone'] ?? '' }}</p>

                        @endif

                        @if (isset($frontends['contact']->values['email']) && $frontends['contact']->values['email'] !="")

                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{ $frontends['contact']->values['email'] ?? '' }}</p>

                        @endif
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Opening</h4>

                        @foreach($frontends['opening_hours']->elements() as $index => $frontend)
                        <h5 class="text-light fw-normal">{{ $frontend->values['date'] ?? '' }}</h5>
                        <p>{{ $frontend->values['time'] ?? '' }}</p>

                        @endforeach

                    </div>

                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="{{$frontends['footer_link']->values['link']}}" target="{{$frontends['footer_link']->values['link_target']}}">{{$frontends['footer_link']->values['title']}}</a>, All Right
                            Reserved.
                            Designed By <a class="border-bottom" target="_blank" href="https://alaa-mhna.com/">Alaa
                                Mhna</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        <!-- Whatsapp -->
        <div class="Whatsapp-wrap">
            <a href="{{(isset($frontends['contact']->values['location']) && $frontends['contact']->values['location']) ?$frontends['contact']->values['location'] : "#"}}" target="_blank" class="Whatsapp-icon">
                <img src="{{asset("website/img/Location.png")}}" alt="cup">
            </a>

            <div class="smoke-wrap">
                <img class="smoke" src="{{asset("website/img/smoke.png")}}" alt="smoke">
            </div>
            <div class="smoke-wrap">
                <img class="smoke2" src="{{asset("website/img/smoke.png")}}" alt="smoke">
            </div>
            <div class="smoke-wrap">
                <img class="smoke3" src="{{asset("website/img/smoke.png")}}" alt="smoke">
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var menus = @json($categories);
        var defaultImage = @json(asset("website/img/smoke.png"));

    </script>
    <!-- Template Javascript -->
    <script src="{{asset("website/js/main.js")}}" defer></script>
</body>

</html>
