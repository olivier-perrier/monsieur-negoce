<aside class="menu">
    <ul class="menu-list">
        <li><a href="/" class="{{Request::is('/') ? 'is-active' :'' }}">Accueil</a></li>
    </ul>
    <p class="menu-label">
        {{ App\User::find(1)->role }}
    </p>
    <ul class="menu-list">
        <li><a href="/users/1/edit">Mon profil</a></li>
        <li><a href="/projects">Mes projets</a></li>
    </ul>
    <p class="menu-label">Négociateur</p>
    <ul class="menu-list">
        <li><a href="/users/1/edit">Mon profil</a></li>
        <li><a href="/negotiations">Mes négociations</a></li>
    </ul>
    <p class="menu-label">Administrateur</p>
    <ul class="menu-list">
        <li><a href="/admin/users" class="{{Request::is('/admin/users') ? 'is-active' :'' }}">Tous les utilisateurs</a></li>
        <li><a href="/admin/projects" class="{{Request::is('/admin/projects') ? 'is-active' :'' }}">Tous les projets</a></li>
    </ul>
    <p class="menu-label">
        Aide
    </p>
    <ul class="menu-list">
        <li><a href="/about">FAQ</a></li>
        <li><a href="/about">A propos</a></li>
    </ul>
    <p class="menu-label">
        Autres
    </p>
    <ul class="menu-list">
        <li><a href="/articles">Articles</a></li>
    </ul>
</aside>