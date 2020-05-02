{{-- $label - $input $name $icon --}}
<div class="field">
    <label>{{$label}}</label>
    <p class="control has-icons-left">
        <input class="input" type="email" name="{{$name}}" value="{{ old('{{$name}}') }}" placeholder="{{$label}}">
        <span class="icon is-small is-left"><i class="{{$icon}}"></i></span>
    </p>
    @error('address.email')<p class="help is-danger">{{ $message }}</p>@enderror
</div>