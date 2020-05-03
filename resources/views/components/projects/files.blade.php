<div class="card mb-3">
    <div class="card-body">

        <h5 class="text-center">Documents disponible(s) ({{ $files->count() }})</h5>
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
                        <span class="file-icon"><i class="fas fa-file-upload"></i></span>
                        <span class="file-label">Selectionner un devis</span>
                    </span>
                </label>
                <input type="submit" value="Ajouter" name="submit" class="button  is-info ml-2">
            </div>
        </form>
        @error('file')
        <p class="help is-danger">{{ $message }}</p>
        @enderror
        @if(session('notification_file'))
        <p class="help is-success">{{ session('notification_file') }}</p>
        @endif
    </div>
</div>