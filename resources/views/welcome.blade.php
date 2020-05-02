{{-- @component('layouts.exmachina') --}}
@extends('layouts.layout')

@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
    <div class="top-right links">
        @auth
        <a href="{{ url('/') }}">Home</a>

        {{-- Logout --}}
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
            {{ __('Se deconnecter') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        @else
        <a href="{{ route('login') }}">Se connecter</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}">S'inscrire</a>
        @endif
        @endauth
    </div>
    @endif

    <div class="content">
        
        @auth
        @if(Auth::user()->isNegotiator() & !Auth::user()->validated)
        <div class="alert alert-info" role="alert" style="color:red;">
            <p>Votre compte est en cours de vérification. Des projets vous seront attribués une fois votre compte validé.</p>
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
            @endcan

            @can('negotiator')
            <a href="{{ route('users.edit', Auth::id()) }}">Profil négociateur</a>
            <a href="{{ route('negotiations.index') }}">Négociations</a>
            @endcan

            @can('admin')
            <a href="{{ route('admin.projects.index') }}">Tous les projets</a>
            <a href="{{ route('admin.users.index') }}">Tous les utilisateurs</a>
            @endcan

            @endauth

            <a href="{{ route('faq.index') }}">FAQ</a>
            <a href="{{ route('about.index') }}">A propos</a>

        </div>

    </div>
</div>

{{-- @endcomponent --}}

@endsection