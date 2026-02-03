@extends('components/layout')

@section('title')
    Catalogo de juegos
@endsection

@section('main')
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered align-middle">
            <thead class="table-dark">
            <tr>
                <th scope="col" class="text-center">ID</th>
                <th scope="col" class="text-center">Título</th>
                <th scope="col" class="text-center">Fecha de publicación</th>
                <th scope="col" class="text-center">Plataforma</th>
                <th scope="col" class="text-center">Tipo</th>
                <th scope="col" class="text-center">Clasificación</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <td class="text-center">{{ $item['num'] }}</td>
                    <td class="text-center">
                        <a href="{{ route('games.show', ['game' => $item['id']]) }}">
                            {{ $item['title'] }}
                        </a>
                    </td>
                    <td class="text-center">{{ $item['date_released'] }}</td>
                    <td class="text-center">{{ $item['platform'] }}</td>
                    <td class="text-center">{{ $item['gamemode'] }}</td>
                    <td class="text-center">{{ $item['age_rating'] }}</td>
                </tr>
            @endforeach

            </tbody>
            <tfoot class="table-light">
            <tr>
                <th scope="col" class="text-center">ID</th>
                <th scope="col" class="text-center">Título</th>
                <th scope="col" class="text-center">Fecha de publicación</th>
                <th scope="col" class="text-center">Plataforma</th>
                <th scope="col" class="text-center">Tipo</th>
                <th scope="col" class="text-center">Clasificación</th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection

