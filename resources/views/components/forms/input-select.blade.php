<select
    id="{{ $id }}"
    name="{{ $name }}"
    class="{{ $class }} @error($name) is-invalid @enderror"
    {{ $required ? 'required' : '' }}
    {{ $disabled ? 'disabled' : '' }}
    {{ $autofocus ? 'autofocus' : '' }}
    {{ $readonly ? 'readonly' : '' }}

>
    @if($placeholder)
        <option value="">{{ $placeholder }}</option>
    @endif

    @foreach($options as $optionValue => $optionText)
        <option value="{{ $optionValue }}" {{ $optionValue == old($name, $selected) ? 'selected' : '' }}>
            {{ $optionText }}
        </option>
    @endforeach
</select>
