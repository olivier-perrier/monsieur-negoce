<div class="card mt-3">
    <div class="card-content">
        <h5 class="title is-5 text-center">Avancement de la demande de négociation</h5>
        <div class="row text-center">
            @foreach($states as $state)
            @if($state->id === $project->state_id)
            <div class="col-md box text-{{ $state->level }}">
                <strong>{{$state->step}}</strong><br>
                {{$state->title}}
            </div>
            @else
            <div class="col-md">
                <strong>{{$state->step}}</strong><br>
                {{$state->title}}
            </div>
            @endif
            @endforeach
        </div>
    </div>