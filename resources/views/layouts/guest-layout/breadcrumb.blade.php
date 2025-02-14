<nav class="breadcrumb-nav" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">{{ $title1 }}</li>
        @if (isset($title2))
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 18L15 12L9 6" stroke="#42474C" stroke-width="1.66678" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <li class="breadcrumb-item active" aria-current="page">{{ $title2 }}</li>
            @if (isset($title3))
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 18L15 12L9 6" stroke="#42474C" stroke-width="1.66678" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <li class="breadcrumb-item active" aria-current="page">{{ $title3 }}</li>
            @endif
        @endif
    </ol>
</nav>
