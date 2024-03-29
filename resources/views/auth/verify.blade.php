@extends('layouts.auth')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Vérifiez votre adresse mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un nouveau lien de vérification a été envoyé à votre adresse mail.') }}
                        </div>
                    @endif

                    {{ __('Merci de vérifier votre boite mail pour un lien de vérification.') }}
                    {{ __('Si vous n\'avez pas recu de mail') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Envoyer un nouveau mail') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
