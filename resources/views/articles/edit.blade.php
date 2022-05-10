
@component('layouts.exmachina')


<div class="container">
    <h1>Update article</h1>


    <form method="POST" action="/articles/{{$article->id}}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{$article->title}}">
        </div>

        <div class="form-group">
            <label for="excerpt">Excerpt</label>
            <textarea class="form-control" name="excerpt" id="excerpt">{{$article->excerpt}}</textarea>
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" name="body" id="body">{{$article->excerpt}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
@endcomponent