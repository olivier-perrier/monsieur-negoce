@component('layouts.exmachina')


<div class="container">
    <h1>New article</h1>


    <form method="POST" action="/articles">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{old('title')}}">
            @error('title')
            <div class="invalid-feedback">{{$errors->first('title')}}</div>
            @enderror

        </div>

        <div class="form-group">
            <label for="excerpt">Excerpt</label>
            <textarea class="form-control @error('excerpt') is-invalid @enderror" name="excerpt" id="excerpt">{{old('excerpt')}}</textarea>
            @error('excerpt')
            <div class="invalid-feedback">{{$errors->first('excerpt')}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body">{{old('body')}}</textarea>
            @error('body')
            <div class="invalid-feedback">{{$errors->first('body')}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="body">Tags</label>
            <select class="custom-select @error('tags') is-invalid @enderror" name="tags[]" id="" multiple>
                @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{$tag->name}}</option>
                @endforeach
            </select>
            @error('tags')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
@endcomponent