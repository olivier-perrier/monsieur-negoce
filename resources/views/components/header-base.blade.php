<header>

    @if (Route::has('login'))
    <div class="text-right p-3 links">
        <a href="/">Monsieur Négoce</a>
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

</header>