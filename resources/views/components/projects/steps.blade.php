<div class="card mb-3">
    <div class="card-content">

        <h5 class="text-center">Avancement de la demande de négociation</h5>
        
        <div class="text-center">
            <p class="badge badge-pill badge-{{ $project->state->level }} p-2">{{ $project->state->title }}</p>
            <p class="text-center">{{ $project->state->description }}</p>
        </div>

        <div class="mt-5">
            <table class="table table-sm table-borderless">
                <tbody>
                    @foreach($states as $state)
                    <tr>
                        <th><span class="badge badge-pill badge-{{ $state->level }} p-2 d-flex justify-content-center">{{ $state->title }}</span></th>
                        <td><small class="text-muted">{{ $state->description }}</small></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>