<button
    type="{{ $type }}"
    class="waves-effect waves-light {{ $class }}"
    id="{{ $id }}"
    name="{{$name }}"
    value="{{$value }}"
    {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge($extraAttributes) }}>

    @if ($icon !== '' && $slotPosition === 'left')
    <i class="{{ $icon }}" style="{{ $iconStyle }}"></i>
@endif
    {{ __($text) }}
    @if ($icon !== '' && $slotPosition === 'right')
        <i class="{{ $icon }}" style="{{ $iconStyle }}"></i>
    @endif
</button>
