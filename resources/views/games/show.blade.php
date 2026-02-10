@extends('components.layout')

@section('title', 'Detalle del juego')

@section('main')
    <div class="row">
        <div class="col-lg-10 mx-auto">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="mb-0">{{ $item->title }}</h1>
                <div class="d-flex gap-2">
                    <a href="{{ url('games') }}" class="btn btn-outline-secondary">
                        Volver al catálogo
                    </a>
                    <a href="{{ route('games.edit', $item->id) }}" class="btn btn-primary">
                        Editar
                    </a>
                </div>
            </div>

            <div class="row g-4">
                @if (! empty($item->image))
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <img
                                src="{{ asset('storage/' . $item->image) }}"
                                class="card-img-top img-fluid"
                                alt="Portada de {{ $item->title }}"
                            >
                        </div>
                    </div>
                @endif

                <div class="@if (! empty($item->image)) col-md-8 @else col-12 @endif">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Información general</h5>

                            <dl class="row mb-0">
                                <dt class="col-sm-4">Título</dt>
                                <dd class="col-sm-8">{{ $item->title }}</dd>

                                <dt class="col-sm-4">Desarrolladora</dt>
                                <dd class="col-sm-8">
                                    {{ $item->developer ?: '—' }}
                                </dd>

                                <dt class="col-sm-4">Distribuidora</dt>
                                <dd class="col-sm-8">
                                    {{ $item->publisher ?: '—' }}
                                </dd>

                                <dt class="col-sm-4">Fecha de lanzamiento</dt>
                                <dd class="col-sm-8">
                                    {{ \Illuminate\Support\Carbon::parse($item->date_released)->format('d/m/Y') }}
                                </dd>

                                <dt class="col-sm-4">Plataforma</dt>
                                <dd class="col-sm-8">
                                    {{ $item->platform ?: '—' }}
                                </dd>

                                <dt class="col-sm-4">Género</dt>
                                <dd class="col-sm-8">
                                    {{ $item->genre ?: '—' }}
                                </dd>

                                <dt class="col-sm-4">Modo de juego</dt>
                                <dd class="col-sm-8">
                                    {{ $item->gamemode ?: '—' }}
                                </dd>

                                <dt class="col-sm-4">Clasificación por edad</dt>
                                <dd class="col-sm-8">
                                    {{ $item->agerating ?: '—' }}
                                </dd>
                            </dl>
                        </div>
                    </div>

                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Descripción</h5>
                            @if (! empty($item->description))
                                <p class="card-text" style="white-space: pre-line;">
                                    {{ $item->description }}
                                </p>
                            @else
                                <p class="text-muted mb-0">
                                    No hay descripción disponible para este juego.
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ url('games') }}" class="btn btn-outline-secondary">
                            Volver al catálogo
                        </a>
                        <form action="{{ route('games.destroy', $item->id) }}" method="POST"
                              onsubmit="return confirm('¿Seguro que quieres eliminar este juego?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
