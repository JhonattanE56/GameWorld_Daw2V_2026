@extends('components/layout')

@section('title')
    Catalogo de juegos
@endsection

@section('main')
    <div class="container my-4">
        @if($items->isEmpty())
            <div class="alert alert-info text-center">
                No hay juegos disponibles en este momento.
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($items as $item)
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            @if(!empty($item['image']))
                                <img src="{{ asset('storage/' . $item['image']) }}"
                                     class="card-img-top img-fluid"
                                     alt="{{ $item['title'] }}"
                                     style="height: 180px; object-fit: cover;">
                            @else
                                <img src="{{ asset('storage/placeholder-game.jpg') }}"
                                     class="card-img-top img-fluid"
                                     alt="{{ $item['title'] }}"
                                     style="height: 180px; object-fit: cover;">
                            @endif

                            <div class="card-body d-flex flex-column">
                                <h6 class="text-muted mb-1 text-truncate">
                                    {{ $item['title'] }}
                                </h6>

                                <h5 class="card-title mb-2 text-truncate" title="{{ $item['title'] }}">
                                    {{ $item['title'] }}
                                </h5>

                                <p class="card-text mb-3">
                                    <span class="fw-semibold">Rating:</span>
                                    {{ number_format($item['rating'], 1) }}
                                </p>

                                <div class="mt-auto">
                                    <a href="{{ route('games.show', $item['id']) }}"
                                       class="btn btn-primary w-100">
                                        Ver más
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
