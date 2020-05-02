<header>

    <div class="links py-3 d-flex justify-content-between">

        <div>
            @if(!Request::is('/'))
            <a href="/">Monsieur Négoce</a>
            @endif
        </div>

        <div>
            @if (Route::has('login'))

            @auth
            <a>{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}</a>

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
            @endif
        </div>

    </div>



</header>

<style scoped>
    a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    a:hover {
        color: #636b6f;
        text-decoration: none;
    }
</style>