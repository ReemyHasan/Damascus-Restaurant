@error($input)
@if ($messages)
    @foreach ($messages as $message)
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @endforeach
@endif
@enderror
