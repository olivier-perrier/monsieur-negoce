@extends('layouts.auth')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('S\'inscrire') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="role" class="col-md-4 label text-md-right">Je m'inscris en tant
                                que</label>
                            <div class="col-md-6">
                                <label class="radio">
                                    <input type="radio" name="role" value="client" checked> Client
                                </label>
                                <label class="radio">
                                    <input type="radio" name="role" value="negotiator"> Négociateur
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">Prénom</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text"
                                    class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                                    value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">Nom</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text"
                                    class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                    value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('Adresse mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirmation du mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sponsor" class="col-md-4 col-form-label text-md-right">Vous avez été invité,
                                indiquez l'adresse mail de votre parrain</label>

                            <div class="col-md-6">
                                <input id="sponsor" type="email" class="form-control" name="sponsor"
                                    value="{{ request()->query('sponsor') }}">
                            </div>
                        </div>

                        {{-- Négociateur --}}
                        <div class="form-group row">
                            <label class="label text-md-center">Vous représentez une entreprise, société, auto-entrepreneur, ou autre.Veuillez compléter le n° SIREN</label>
                        </div>

                        <div class="form-group row">
                            <label for="siren" class="col-md-4 col-form-label text-md-right">SIREN</label>

                            <div class="col-md-6">
                                <input id="siren" type="text" class="form-control @error('siren') is-invalid @enderror"
                                    name="siren" value="{{ old('siren') }}" autocomplete="siren">

                                @error('siren')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Téléphone</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ old('phone') }}" autocomplete="phone">

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="mx-auto">
                                <input type="checkbox" class="form-check-input" required>
                                <label class=" form-check-label" for="exampleCheck1">En cliquant sur le bouton s'inscrire, <br />j'accepte les <a
                                        href="#">conditions
                                        d'utilisations</a> de Monsieur Négoce</label>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('S\'inscrire') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection