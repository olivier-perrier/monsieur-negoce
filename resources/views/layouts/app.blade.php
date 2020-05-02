@extends('layouts.layout')

@section('app')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-2">
            <aside>
                <x-sidebar />
            </aside>
        </div>
        <div class="col-md-10">
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
</div>

@endsection