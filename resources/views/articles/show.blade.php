@component('layouts.exmachina')

<div id="main" class="container">
    <section>
        <header>
            <h2>{{$article->title}}</h2>
        </header>
        <p>
            {{$article->body}}
        </p>

        @foreach($article->tags as $tag)
        <!-- <a href="/articles?tag={{$tag->name}}">{{$tag->name}}</a> -->
        <a href="{{ route('articles.index', ['tag' => $tag->name] ) }}">{{$tag->name}}</a>
        @endforeach

        <a href="/articles/{{$article->id}}/edit" class="button">Edit</a>
    </section>
</div>



@endcomponent