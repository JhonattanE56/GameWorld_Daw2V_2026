@extends('components/layout')

@section('title', 'Mi perfil')

@section('main')
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Perfil</h1>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Información de perfil</h5>
                </div>
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Cambiar contraseña</h5>
                </div>
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0 text-danger">Eliminar cuenta</h5>
                </div>
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection
