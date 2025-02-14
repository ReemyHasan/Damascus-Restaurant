@if (isset($isHeading) && $isHeading)
<li class="menu-title">{{ __($title) }}</li>
@else
<li>
    <a href="{{ $route ?? 'javascript: void(0);' }}" class="{{ (isset($submenu) && $submenu) ? 'has-arrow waves-effect' : '' }}">
        @if ($icon)
        <i class="{{ $icon }}"></i>
        @endif
        <span>{{ __($title) }}</span>

        @if (isset($badge) && $badge)
        <span class="badge float-end {{ $badgeClass }}">{!! $badge !!}</span>
        @endif
    </a>
    @if (isset($submenu) && $submenu)
    <ul class="sub-menu" aria-expanded="false">
        @foreach ($submenu as $item)

        <li class="submenu-item">

            <a href="{{ $item['route'] }}">
                @if (isset($item['icon']))
                <i class="{{ $item['icon'] }} submenu-icon"></i>
                @endif
                {{ __($item['title']) }}</a>
        </li>
        @endforeach
    </ul>
    @endif
</li>
@endif
