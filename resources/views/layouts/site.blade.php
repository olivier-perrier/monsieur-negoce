@extends('layouts.app')

@section('app')

<x-header />

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

<x-footer />

@endsection