<div class="card mt-3">
    <div class="card-content">

        <h5 class="title is-5 text-center">Avancement de la demande de négociation</h5>
        
        <div class="text-center">
            <p class="tag is-{{ $project->state->level }} is-rounded text-center">{{ $project->state->title }}</p>
            <p class="text-center">{{ $project->state->description }}</p>
        </div>

        <div class="mt-5">
            <table class="table table-sm table-borderless">
                <tbody>
                    @foreach($states as $state)
                    <tr>
                        <th><span class="tag is-{{ $state->level }} is-rounded">{{ $state->title }}</span></th>
                        <td><small class="text-muted">{{ $state->description }}</small></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>