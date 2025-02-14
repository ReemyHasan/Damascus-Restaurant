<input
    type="number"
    id="{{ $id }}"
    name="{{ $name }}"
    value="{{ old($name, $value) }}"
    class="{{ $class }} @error($name) is-invalid @enderror"
    placeholder="{{ $placeholder }}"
    {{ $required ? 'required' : '' }}
    {{ $disabled ? 'disabled' : '' }}
    {{ $autofocus ? 'autofocus' : '' }}
    {{ $autocomplete ? "autocomplete=$autocomplete" : '' }}
    {{ $min !== null ? "min=$min" : '' }}
    {{ $max !== null ? "max=$max" : '' }}
    {{ $step !== null ? "step=$step" : '' }}
>
