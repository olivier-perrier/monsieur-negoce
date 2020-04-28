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
    </ul>
    @endcan

    @can('negotiator')
    <p class="menu-label">Négociateur</p>
    <ul class="menu-list">
        <li><a href="{{ route('users.edit', Auth::id()) }}">Mon profil</a></li>
        <li><a href="{{ route('negotiations.index') }}">Mes négociations</a></li>
    </ul>
    @endcan

    @can('admin')
    <p class="menu-label">Administrateur</p>
    <ul class="menu-list">
        <li><a href="{{ route('admin.projects.index') }}"
                class="{{ Request::is('/admin/users') ? 'is-active' :'' }}">Tous les projets</a></li>
        <li><a href="{{ route('admin.users.index') }}"
                class="{{ Request::is('/admin/projects') ? 'is-active' :'' }}">Tous les utilisateurs</a></li>
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
    <p class="menu-label">
        Autres
    </p>
    <ul class="menu-list">
        <li><a href="{{ route('articles.index') }}">Articles</a></li>
    </ul>
</aside>