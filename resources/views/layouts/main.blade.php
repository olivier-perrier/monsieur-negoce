@extends('layouts.app')

@section('section')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-2">
            <aside>
                <x-sidebar></x-sidebar>
            </aside>
        </div>
        <div class="col-md-10">
            <main>
                {{-- {{ $slot }} --}}
                @yield('content')
            </main>
        </div>
    </div>
</div>


@endsection