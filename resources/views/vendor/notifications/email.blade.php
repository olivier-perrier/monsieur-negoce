@component('vendor.mail.html.logo')
@endcomponent

@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
switch ($level) {
    case 'success':
    case 'error':
        $color = $level;
        break;
    default:
        $color = 'primary';
}
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Cordialement,'),<br>
L'équipe {{ config('app.name') }}
@endif

@component('vendor.mail.html.address')
@endcomponent

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
"Ceci est un email automatique, merci de ne pas y répondre. <br>" . 
"Si vous avez des difficultés pour cliquer sur le lien \":actionText\", \n" .
'vous pouvez copier et coller l\'url ci dessous dans votre navigateur:',
[
'actionText' => $actionText,
]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent