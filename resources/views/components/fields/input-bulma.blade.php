<div class="field">

    @isset($label)
    <label class="label">{{ $label }}</label>
    @endisset

    <div class="control has-icons-left">

        <input class="input" type="{{ $type ?? 'text' }}" name="{{ $name }}" value="{{ $value }}" {{ $atts ?? '' }}>

        <span class="icon is-small is-left">
            <i class="{{ $icon ?? '' }}"></i>
        </span>

    </div>

    @isset ($help)
    <small class="form-text text-muted">{{ $help }}</small>
    @endisset
        
    @error($name)
    <p class="help is-success">{{ $message }}</p>
    @enderror

</div>