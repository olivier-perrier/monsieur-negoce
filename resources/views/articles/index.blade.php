@component('layouts.exmachina')

<!-- Main -->
<div id="page">

    <!-- Extra -->
    <div id="marketing" class="container">
        <div class="row">
            @forelse($articles as $article)
            <div class="4u">
                <section>
                    <header>
                        <h2>{{$article->title}}</h2>
                    </header>
                    <p class="subtitle">{{$article->body}}</p>
                    <p>
                        <a href="{{ $article->path() }}">
                            <img src="/exmachina/images/pics4.jpg" alt="" width="200">
                        </a>
                    </p>
                    <a href="/articles/{{$article->id}}" class="button">More</a>
                </section>
            </div>
            @empty

            <p>No articles to display</p>
            @endforelse

        </div>
        <br>
        {{-- $articles->links() --}}


        <a href="/articles/create" class="button">Create</a>

    </div>
</div>

@endcomponent