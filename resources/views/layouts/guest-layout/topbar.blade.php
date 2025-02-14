<!-- ///////////////// Start Header ///////////////// -->
<header id="header">
    <div class="uniq-container">
        <div class="row bor">
            <div class="col-6 col-md-2">
                <a href="{{ route('website.home') }}" class="logo" aria-label="Go to Tilde Homepage">
                    <img src="{{ URL::asset('website/img/logo.png') }}" alt="">
                </a>
            </div>
            <div class="col align-items-center nav-links">
                <div class="links">
                    <div class="d-flex justify-content-center flex-fill">
                        <a class="link-item" href="{{ route('website.home') }}">{{ trans('website.home') }}</a>
                        <div class="link-item dropdown">
                            <a href="{{ route('website.courseList') }}">
                                {{ trans('website.courses') }}

                            </a>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 9L12 15L18 9" stroke="#42474C" stroke-width="1.66678" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                            <div class="dropdown-list" style="width: 800px;">
                                <div class="row">
                                    @foreach ($nav_courses as $category)
                                    <div class="col-md-4 mb-2">
                                        <h2>{{ $category->title }}</h2>
                                    </div>
                                    @endforeach
                                    @foreach ($nav_courses as $category)
                                    <div class="col-md-4 {{ !$loop->first && !$loop->last ? 'b-r' : '' }}">
                                        @foreach ($category->courses as $course)
                                        <a href="{{ route('website.courseDetails', $course) }}">{{ $course->title }}
                                            @if ($course->tags)
                                            @foreach ($course->tags as $tag)
                                            <span class="Kalam">{{ $tag->tag->name }}</span>
                                            @endforeach
                                            @endif
                                        </a>
                                        @endforeach

                                    </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <div class="link-item dropdown">
                            <a href="{{ route('website.culturalImmersions') }}">
                                {{ trans('website.culturalImerrsion') }}
                            </a>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 9L12 15L18 9" stroke="#42474C" stroke-width="1.66678" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <div class="dropdown-list" style="width: max-content;">
                                <div class="row">
                                    <div class="col-md-12">
                                        @foreach ($nav_culturalImmersions as $item)
                                        <a href="{{ route('website.culturalImmersionDetails', $item) }}">{{ $item->title }}
                                            @if ($item->tags)
                                            @foreach ($item->tags as $tag)
                                            <span class="Kalam">{{ $tag->tag->name }}</span>
                                            @endforeach
                                            @endif
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="link-item dropdown">
                            {{ trans('website.school') }}
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 9L12 15L18 9" stroke="#42474C" stroke-width="1.66678" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <div class="dropdown-list" style="width: max-content;">
                                <div class="row">
                                    <div class="col-md-12">
                                        @foreach ($nav_abouts as $about)
                                        {{-- <a href="{{ route('website.about', translate($slug)) }}">{{ $title }}</a> --}}

                                    <a href="{{ route('website.about', ['about' => $about->slug]) }}"
                                        class="link">{{ $about->title }}</a>


                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="link-item dropdown">
                            {{ trans('website.prices') }}
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 9L12 15L18 9" stroke="#42474C" stroke-width="1.66678" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <div class="dropdown-list" style="width: max-content;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{route('website.prices')}}">
                                            {{ trans('website.our_prices') }}
                                        </a>
                                        <a href="{{route('website.offer')}}">
                                            {{ trans('website.specialOffer') }}
                                        </a>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="link-item dropdown">
                            {{ trans('website.teaching_material') }}
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 9L12 15L18 9" stroke="#42474C" stroke-width="1.66678" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <div class="dropdown-list" style="width:max-content;">
                                <div class="row">
                                    <div class="col-md-12">
                                        @foreach ($nav_teachingMaterials as $item)
                                        @if ($item->is_external)
                                        <a href="{{ $item->external_url }}" target="_blank" rel="noopener">
                                            @php
                                            $title = str_contains(Str::lower($item->title), 'youtube');
                                            @endphp
                                            @if ($title)
                                            <img src="{{ URL::asset('website/img/youtube.png') }}" alt=""
                                            width="24" height="24"
                                            >
                                            @endif
                                            {{ $item->title }}
                                        </a>
                                        @else
                                        <a href="{{ route('website.teachingMaterial', $item) }}">{{ $item->title }}</a>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('website.contact') }}" class="link-item">
                            {{ trans('website.contact') }}
                        </a>
                    </div>
                    <a href="{{ route('website.test') }}" class="btn-link btn-main">
                        {{ trans('website.test_your_spanish') }}
                    </a>
                    <div class="nav-item dropdown lang-menu">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="{{ URL::asset('assets/images/flags/' . app()->getLocale() . '.png') }}"
                                alt=" {{app()->getLocale()}}"
                                width="20" height="14">
                        </a>
                        <ul class="dropdown-menu">
                            @foreach(getAvailableLanguage() as $key => $value)
                            <li>
                                <a class="dropdown-item" href="{{ route('language.switch', $key) }}">
                                    <img src="{{ URL::asset('assets/images/flags/' . $key . '.png') }}"
                                        alt="{{$value}}"  width="20" height="14">
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>


                </div>
            </div>
            <div class="col mobile-menu align-items-center justify-content-end ">
                <div class="icon-bar" onclick="openSideBar()" id="icon-bar">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 17.999H20.9998" stroke="#006D98" stroke-width="1.66678" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M3 12H20.9998" stroke="#006D98" stroke-width="1.66678" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M3 6H20.9998" stroke="#006D98" stroke-width="1.66678" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="overlay" id="overlay" onclick="CloseSideBar()"></div>
                <div class="side-bar" id="side-bar">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <div class="nav-item dropdown lang-menu">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="{{ URL::asset('assets/images/flags/' . app()->getLocale() . '.png') }}"
                                        alt=" {{app()->getLocale()}}"
                                        width="20" height="14">
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach(getAvailableLanguage() as $key => $value)
                                    <li>
                                        <a class="dropdown-item" href="{{ route('language.switch', $key) }}">
                                            <img src="{{ URL::asset('assets/images/flags/' . $key . '.png') }}"
                                                alt="{{$value}}"
                                                width="20" height="14">
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-6 d-flex align-items-center justify-content-end">
                            <div class="close p-2" onclick="CloseSideBar()">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 6L6 18" stroke="#006D98" stroke-width="1.66678" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M6 6L18 18" stroke="#006D98" stroke-width="1.66678" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                        <a href="{{ route('website.home') }}" class="link">{{ trans('website.home') }}</a>
                        <div class="accordion" id="link-dropdown">
                            <!-- Start Courses link -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="link-One">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        {{ trans('website.courses') }}
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="link-One"
                                    data-bs-parent="#link-dropdown">
                                    <!-- start -->
                                    <div style="padding-inline-start: 10px;margin-top: 10px;" class="accordion"
                                        id="link-nested">
                                        @foreach ($nav_courses as $index => $category)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="link-One">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#nested-{{ $index }}" aria-expanded="false"
                                                    aria-controls="nested-{{ $index }}">
                                                    {{ $category->title }}

                                                </button>
                                            </h2>
                                            <div id="nested-{{ $index }}" class="accordion-collapse collapse"
                                                aria-labelledby="link-One" data-bs-parent="#link-nested">
                                                @foreach ($category->courses as $course)
                                                <a href="{{ route('website.courseDetails', $course) }}"
                                                    class="link">{{ $course->title }}
                                                    @if ($course->tags)
                                                    @foreach ($course->tags as $tag)
                                                    <span class="Kalam">{{ $tag->tag->name }}</span>
                                                    @endforeach
                                                    @endif
                                                </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <!-- end -->
                                </div>
                            </div>
                            <!-- End Courses link -->
                            <!-- Start Cultural Immersion link -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="link-Two">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        {{ trans('website.culturalImerrsion') }}
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="link-Two"
                                    data-bs-parent="#link-dropdown">
                                    @foreach ($nav_culturalImmersions as $item)
                                    <a href="{{ route('website.culturalImmersionDetails', $item) }}"
                                        class="link">{{ $item->title }}</a>
                                    @if ($item->tags)
                                    @foreach ($item->tags as $tag)
                                    <span class="Kalam">{{ $tag->tag->name }}</span>
                                    @endforeach
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <!-- End Cultural Immersion link -->
                            <!-- Start The School link -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="link-Three">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        {{ trans('website.school') }}
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="link-Three"
                                    data-bs-parent="#link-dropdown">
                                    @foreach ($nav_abouts as $about)


                                    <a href="{{ route('website.about', ['about' => $about->slug]) }}"
                                        class="link">{{ $about->title }}</a>

                                    @endforeach
                                </div>
                            </div>
                            <!-- End The School link -->
                            <!-- Start Prices link -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="link-four">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapsefour" aria-expanded="false"
                                        aria-controls="collapsefour">
                                        {{ trans('website.prices') }}
                                    </button>
                                </h2>
                                <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="link-four"
                                    data-bs-parent="#link-dropdown">
                                    <a href="{{route('website.prices')}}" class="link">
                                        {{ trans('website.our_prices') }}
                                    </a>
                                    <a href="{{route('website.offer')}}"
                                        class="link">{{ trans('website.specialOffer') }}</a>
                                </div>
                            </div>
                            <!-- End Prices link -->
                            <!-- Start Teaching Material link -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="link-five">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapsefive" aria-expanded="false"
                                        aria-controls="collapsefive">
                                        {{ trans('website.teaching_material') }}
                                    </button>
                                </h2>
                                <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="link-five"
                                    data-bs-parent="#link-dropdown">
                                    @foreach ($nav_teachingMaterials as $item)
                                    @if ($item->is_external)
                                    <a href="{{ $item->external_url }}" class="link" target="_blank" rel="noopener">
                                        @php
                                        $title = str_contains(Str::lower($item->title), 'youtube');
                                        @endphp
                                        @if ($title)
                                        <img src="{{ URL::asset('website/img/youtube.png') }}" alt=""  width="24" height="24">
                                        @endif
                                        {{ $item->title }}
                                    </a>
                                    @else
                                    <a class="link"
                                        href="{{ route('website.teachingMaterial', $item) }}">{{ $item->title }}</a>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <!-- End Teaching Material link -->
                        </div>
                        <a href="{{ route('website.contact') }}" class="link">{{ trans('website.contact') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<script>
    function openSideBar() {
        document.getElementById("side-bar").classList.add('open');
        document.getElementById("overlay").classList.add('open');
        document.querySelector("html").style.overflowY = "hidden" ;
    }

    function CloseSideBar() {
        //   linkItem.forEach(element => {
        //     element.classList.remove('open');
        // });
        document.getElementById("side-bar").classList.remove('open');
        document.getElementById("overlay").classList.remove('open');
        document.querySelector("html").style.overflowY = "scroll" ;
    }

</script>
<!-- ///////////////// End Header ///////////////// -->
