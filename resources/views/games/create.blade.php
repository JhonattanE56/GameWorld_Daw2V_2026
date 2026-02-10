@extends('components/layout')

@section('title')
    Crear nuevo juego
@endsection

@section('main')
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h1 class="mb-4">Crear nuevo juego</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('games.store') }}" enctype="multipart/form-data">
                @csrf {{-- CSRF protection --}}

                {{-- Título --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" name="title" id="title" class="form-control" maxlength="255" required>
                </div>

                {{-- Desarrolladora --}}
                <div class="mb-3">
                    <label for="developer" class="form-label">Desarrolladora</label>
                    <input type="text" name="developer" id="developer" class="form-control" maxlength="100" required>
                </div>

                {{-- Distribuidora / Publisher --}}
                <div class="mb-3">
                    <label for="publisher" class="form-label">Distribuidora</label>
                    <input type="text" name="publisher" id="publisher" class="form-control" maxlength="200">
                </div>

                {{-- Fecha de lanzamiento --}}
                <div class="mb-3">
                    <label for="date_released" class="form-label">Fecha de lanzamiento</label>
                    <input type="date" name="date_released" id="date_released" class="form-control">
                </div>

                {{-- Plataforma --}}
                <div class="mb-3">
                    <label for="platform" class="form-label">Plataforma</label>
                    <select name="platform" id="platform" class="form-select" required>
                        <option value="" selected disabled>Selecciona una plataforma</option>
                        @foreach ($platorms as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Género --}}
                <div class="mb-3">
                    <label for="genre" class="form-label">Género</label>
                    <select name="genre" id="genre" class="form-select" required>
                        <option value="" selected disabled>Selecciona un género</option>
                        @foreach ($genres as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Modo de juego --}}
                <div class="mb-3">
                    <label for="gamemode" class="form-label">Modo de juego</label>
                    <select name="gamemode" id="gamemode" class="form-select" required>
                        <option value="" selected disabled>Selecciona un modo</option>
                        @foreach ($gamemodes as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Clasificación por edad --}}
                <div class="mb-3">
                    <label for="age_rating" class="form-label">Clasificación por edad</label>
                    <select name="age_rating" id="age_rating" class="form-select">
                        <option value="" selected disabled>Selecciona una clasificación</option>
                        @foreach ($age_ratings as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Descripción --}}
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea name="description" id="description" class="form-control"rows="4"></textarea>
                </div>

                {{-- Imagen (upload) --}}
                <div class="mb-3">
                    <label for="image" class="form-label">Imagen de portada</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                    <div class="form-text">
                        Sube una imagen del juego (JPG, PNG, etc.).
                    </div>
                </div>

                {{-- Botones --}}
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ url('/games') }}" class="btn btn-outline-secondary">Volver a inicio</a>
                    <button type="submit" class="btn btn-primary">Crear juego</button>
                </div>
            </form>
        </div>
    </div>
@endsection
