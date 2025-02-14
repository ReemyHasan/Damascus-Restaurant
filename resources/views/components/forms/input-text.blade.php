<input
    type="{{ $type }}"
    id="{{ $id ?: $name }}"
    name="{{ $name }}"
    value="{{ old($name, $value) ?? '' }}"
    class="{{ $class }} @error($name) is-invalid @enderror"
    placeholder="{{ $placeholder }}"
    {{ $required ? 'required' : '' }}
    {{ $autofocus ? 'autofocus' : '' }}
    {{ $autocomplete ? "autocomplete=$autocomplete" : '' }}
    {{ $disabled ? 'disabled' : '' }}

>
