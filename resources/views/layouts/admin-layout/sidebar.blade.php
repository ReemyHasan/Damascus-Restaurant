<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="#" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('website/img/Logo-Damaskus.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('website/img/Logo-Damaskus.png') }}" alt="" height="60">
            </span>
        </a>

        <a href="#" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('website/img/Logo-Damaskus.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('website/img/Logo-Damaskus.png') }}" alt="" height="60">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <x-sidebar-link title="Menu" :isHeading="true" />

                <x-sidebar-link title="Categories" :route="route('admin.categories.index')" icon="fas fa-info-circle" />


                <x-sidebar-link title="Plates" :route="route('admin.plates.index')" icon="fas fa-chart-line" />
                <x-sidebar-link title="Home Page" :route="route('admin.frontend.index')" icon="fas fa-layer-group" />



                <x-sidebar-link title="Profile" :route="route('admin.profile.edit')" icon="far fa-user-circle" />
                {{-- <x-sidebar-link title="sidebar.pages" :isHeading="true" /> --}}

                <x-sidebar-link title="Clear Cache" :route="route('admin.clear_cache')" icon="fas fa-trash-alt" />

            </ul>
        </div>
    </div>
</div>
