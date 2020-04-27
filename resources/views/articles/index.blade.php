@component('layouts.exmachina')

<div class="container m-5">


    @forelse($articles as $article)
    <section>
        <header>
            <h2>{{$article->title}}</h2>
        </header>
        <p class="subtitle">{{$article->body}}</p>
        <p>
            <a href="{{ $article->path() }}">
            </a>
        </p>
        <a href="/articles/{{$article->id}}" class="button">More</a>
    </section>
    @empty
    <div class="text-center">
        <p>Articles à venir, revenez plus tard</p>

    </div>
    @endforelse

    {{-- $articles->links() --}}

    @auth
    @if (Auth::user()->isAdministrator())
    <a href="/articles/create" class="button">Create</a>
    @endif
    @endauth

</div>

@endcomponent