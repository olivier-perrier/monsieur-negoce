@component('layouts.site')

<div class="container">


    <div class="my-3 text-center">

        <h2 class="my-2">Vos filleuls</h2>
        <ul>
            @forelse ($sponsors as $sponsor)
            <li>
                <p>{{ $sponsor->fullname() }} - {{ $sponsor->email }}</p>
            </li>
            @empty
            <span>Aucun filleul pour l'instant</span>
            @endforelse
        </ul>
    </div>



</div>

@endcomponent