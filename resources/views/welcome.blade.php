@extends('layouts.auth')

@section('content')

<div class="flex-center position-ref full-height" id="home">

    <div class="content">

        @auth
        @if(Auth::user()->isNegotiator() & !Auth::user()->validated)
        <div class="alert alert-info" role="alert" style="color:red;">
            <p>Votre compte est en cours de vérification. Des projets vous seront attribués une fois votre compte
                validé.</p>
        </div>
        @endif
        @endauth

        <div class="title m-b-md">
            @auth
            Bonjour {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
            @else
            Monsieur Négoce
            @endauth
        </div>

        <div class="links">

            @auth

            @can('client')
            <a href="{{ route('users.edit', Auth::id()) }}">Profil client</a>
            <a href=" {{ route('projects.index') }}">Mes projets</a>
            <a href="{{ route('faq-client') }}">FAQ</a>
            @endcan

            @can('negotiator')
            <a href="{{ route('users.edit', Auth::id()) }}">Profil négociateur</a>
            <a href="{{ route('negotiations.index') }}">Négociations</a>
            <a href="{{ route('faq-nego') }}">FAQ</a>
            @endcan

            @can('admin')
            <a href="{{ route('admin.projects.index') }}">Tous les projets</a>
            <a href="{{ route('admin.users.index') }}">Tous les utilisateurs</a>
            @endcan

            @endauth

            <a href="{{ route('about.index') }}">A propos</a>

        </div>

    </div>
</div>

@endsection