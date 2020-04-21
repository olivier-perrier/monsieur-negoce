<header>
    <div class="container">

        <!-- Logo -->

        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <h1></h1>

                <a class="navbar-item" href="/">
                    <h1>Monsieur négoce</h1>
                    <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
                </a>

                <!-- navbar items, navbar burger... -->
            </div>
        </nav>

        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li class="{{Request::is('/') ? 'active' : ''}}"><a href="/">Home</a></li>
                <li class="{{Request::is('projects') ? 'active' : ''}}">
                    <a href="/projects">Mes projets</a>
                </li>
                <li class="{{Request::is('user') ? 'active' : ''}}">
                    <a href="/users/1/edit">Mon profil</a>
                </li>
                <li class="{{Request::is('articles') ? 'active' : ''}}">
                    <a href="/articles">Articles</a>
                </li>
                <li class="{{Request::is('faq') ? 'active' : ''}}">
                    <a href="/about">FAQ</a>
                </li>
                <li class="{{Request::is('about') ? 'active' : ''}}">
                    <a href="/about">A propos</a>
                </li>
            </ul>
        </nav>

    </div>
</header>