<div class="form-group">

    @isset($label)
    <label for="{{ $name }}">{{ $label }}</label>
    @endisset

    <input class="form-control" type="{{ $type ?? 'text' }}" name="{{ $name }}" value="{{ $value }}"
        {{ $atts ?? '' }}>

    @isset ($help)
    <small class="form-text text-muted">{{ $help }}</small>
    @endisset

    @error("{{ $name }}")
    <p class="help is-success">{{ $message }}</p>
    @enderror

</div>