@extends('components/layout')

@section('title', 'Iniciar sesión')

@section('main')
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    <h5 class="mb-0">Iniciar sesión</h5>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email"
                                   type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                                   autofocus
                                   autocomplete="username"
                                   class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password"
                                   type="password"
                                   name="password"
                                   required
                                   autocomplete="current-password"
                                   class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Remember me --}}
                        <div class="mb-3 form-check">
                            <input id="remember_me"
                                   type="checkbox"
                                   name="remember"
                                   class="form-check-input">
                            <label class="form-check-label" for="remember_me">
                                Recuérdame
                            </label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            @if (Route::has('password.request'))
                                <a class="small" href="{{ route('password.request') }}">
                                    ¿Has olvidado la contraseña?
                                </a>
                            @endif

                            <button type="submit" class="btn btn-primary">
                                Entrar
                            </button>
                        </div>
                    </form>

                    <hr>

                    <div class="text-center">
                        <span class="small">¿No tienes cuenta?</span>
                        <a href="{{ route('register') }}" class="small ms-1">
                            Regístrate
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
