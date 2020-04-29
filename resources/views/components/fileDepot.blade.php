<div class="card-content">
    <h5 class="title is-5 text-center">Documents disponible(s) ({{ $files->count() }})</h5>
    @foreach($files as $file)
    <p><a href="{{ route('file.download', $file->id) }}">{{ $file->original_name }} </a></p>
    @endforeach

    <form action="{{ route('file.upload', ['project_id' => $project->id]) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="file">
            <label class="file-label">
                <input type="file" name="file" class="file-input">
                <span class="file-cta">
                    <span class="file-icon"><i class="fas fa-upload"></i></span>
                    <span class="file-label">Selectionner un devis</span>
                </span>
            </label>
            <input type="submit" value="Ajouter" name="submit" class="button ml-2">
        </div>
    </form>
</div>