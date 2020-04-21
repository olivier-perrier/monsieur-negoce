<header>
    <nav class="navbar is-light" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                Monsieur Négoce
                <!-- <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28"> -->
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
            </div>

            <div class="navbar-end">
                @auth
                <a class="navbar-item">
                    {{ Auth::user()->name }}
                </a>
                @else
                <div class="navbar-item">
                    <div class="buttons">
                        <a href="/login" class="button is-light">
                            Log in
                        </a>
                    </div>
                </div>
                @endauth

            </div>
        </div>
    </nav>

</header>