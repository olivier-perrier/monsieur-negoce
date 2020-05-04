<style scoped>
    .menu-label {
        margin-bottom: 1em;
    }

    .menu-label {
        color: #7a7a7a;
        font-size: .75em;
        letter-spacing: .1em;
        text-transform: uppercase;
    }

    ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .menu-list a {
        border-radius: 2px;
        color: #4a4a4a;
        display: block;
        padding: .5em .75em;
    }

    .menu-list a:hover {
        background-color: #f5f5f5;
        color: #363636;
    }
</style>

<aside class="menu">
    <ul class="menu-list">
        <li><a href="/" class="{{Request::is('/') ? 'is-active' :'' }}">Accueil</a></li>
    </ul>
    @auth

    @can('client')
    <p class="menu-label">Client</p>
    <ul class="menu-list">
        <li><a href="{{ route('users.edit', Auth::id()) }}">Mon profil</a></li>
        <li><a href="{{ route('projects.index') }}">Mes projets</a></li>
        <li><a href="{{ route('sponsors.index') }}">Parrainage</a></li>
    </ul>
    @endcan

    @can('negotiator')
    <p class="menu-label">Négociateur</p>
    <ul class="menu-list">
        <li><a href="{{ route('users.edit', Auth::id()) }}">Mon profil</a></li>
        <li><a href="{{ route('negotiations.index') }}">Mes négociations</a></li>
        <li><a href="{{ route('users.cashings.index', Auth::id()) }}">Mes encaissements</a></li>
        <li><a href="{{ route('sponsors.index') }}">Parrainage</a></li>
    </ul>
    @endcan

    @can('admin')
    <p class="menu-label">Administrateur</p>
    <ul class="menu-list">
        <li><a href="{{ route('admin.projects.index') }}">Tous les projets</a></li>
        <li><a href="{{ route('admin.users.index') }}">Tous les utilisateurs</a></li>
        <li><a href="{{ route('sponsors.index') }}">Parrainage</a></li>
    </ul>
    @endcan

    @endauth

    <p class="menu-label">
        Aide
    </p>
    <ul class="menu-list">
        <li><a href="{{ route('faq.index') }}">FAQ</a></li>
        <li><a href="{{ route('about.index') }}">A propos</a></li>

    </ul>
</aside>