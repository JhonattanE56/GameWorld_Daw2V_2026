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
                                    {{ $item->age_rating ?: '—' }}
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

                    {{-- Sección de valoraciones --}}
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Valoraciones</h5>

                            @if ($item->ratings->count() > 0)
                                @php
                                    $average = number_format($item->ratings->avg('rating'), 1);
                                @endphp

                                <p class="mb-1">
                                    Valoración media:
                                    <strong>{{ $average }}/5</strong>
                                    <span class="text-warning ms-2">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= round($average))
                                                ★
                                            @else
                                                ☆
                                            @endif
                                        @endfor
                                    </span>
                                </p>
                                <p class="text-muted mb-0">
                                    Total de valoraciones: {{ $item->ratings->count() }}
                                </p>
                            @else
                                <p class="text-muted mb-0">
                                    Este juego aún no tiene valoraciones.
                                </p>
                            @endif
                        </div>
                    </div>

                    {{-- Sección de comentarios --}}
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Comentarios</h5>

                            @if ($item->comments->count() > 0)
                                <ul class="list-group">
                                    @foreach ($item->comments as $comment)
                                        <li class="list-group-item">
                                            <div class="d-flex justify-content-between">
                                                <strong>{{ $comment->user->name ?? 'Usuario' }}</strong>
                                                <span class="text-muted small">
                                                    {{ $comment->created_at?->format('d/m/Y H:i') }}
                                                </span>
                                            </div>
                                            <p class="mb-0 mt-2">
                                                {{ $comment->content ?? $comment->comment }}
                                            </p>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-muted mb-0">
                                    Todavía no hay comentarios para este juego.
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ url('games') }}" class="btn btn-outline-secondary">
                            Volver al catálogo
                        </a>

                        <div class="d-flex gap-2">
                            @auth
                                <a href="{{ route('ratings.create', ['game_id' => $item->id]) }}"
                                   class="btn btn-outline-primary">
                                    Valorar
                                </a>

                                <a href="{{ route('comments.create', ['game_id' => $item->id]) }}"
                                   class="btn btn-outline-secondary">
                                    Comentar
                                </a>
                            @endauth

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
    </div>
@endsection
