<nav class="navbar navbar-expand-lg navbar-light bg-white">


    <a class="navbar-brand" href="/">
        @if(!Request::is('/')) Monsieur Négoce @endif
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
            </li>
            @endif
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('S\'inscrire') }}</a>
            </li>
            @endif

            @endguest

            @auth

            <li class="nav-item">
                <a class="nav-link">
                    {{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    {{ __('Se deconnecter') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

            @endauth

        </ul>

    </div>
</nav>


<style scoped>
    nav {
        font-family: "Nunito", sans-serif;

    }

    nav .nav-brand {
        color: #636b6f;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    nav .nav-link {
        color: #636b6f;
        padding: .5rem 1rem;
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