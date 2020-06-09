@extends('layouts.app')

@section('app')

<x-header />

<div class="container-fluid">

    <div class="row">
        <div class="col-md-2 shadow">
            <aside class="my-2">
                <x-sidebar />
            </aside>
        </div>
        <div class="col-md-10">
            <main class="mt-3">
                {{ $slot }}
            </main>
        </div>
    </div>
</div>

<x-footer />

@endsection