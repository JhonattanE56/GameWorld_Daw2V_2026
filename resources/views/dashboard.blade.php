@extends('components/layout')

@section('title', 'Panel de administración')

@section('main')
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Dashboard</h1>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <p class="mb-0">
                        Bienvenido, {{ Auth::user()->name }}.
                    </p>
                    <p class="mb-0">
                        Aquí podrás gestionar el contenido de GameWorld.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
