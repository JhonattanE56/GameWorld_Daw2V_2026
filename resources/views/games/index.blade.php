@extends('components/layout')

@section('title')
    Catalogo de juegos
@endsection

@section('main')
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered align-middle">
            <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Título</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td>
                        <a href="{{ route('games.show', ['game' => $item['id']]) }}">
                            {{ $item['title'] }}
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
            <tfoot class="table-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Título</th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection

