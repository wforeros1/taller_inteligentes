<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Iniciar Sesión - Asistente de Salud</title>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
{{-- La clave está aquí: añadimos la clase 'login-page' --}}
<body class="login-page"> 
    <div class="login-container">
        <div class="login-promo-panel">
            <div class="promo-content">
                <h1 class="promo-icon">👵👴</h1>
                <h2 class="promo-title">Asistente de Salud</h2>
                <p class="promo-text">Tu bienestar, organizado y al alcance de tu mano. Inicia sesión para continuar.</p>
            </div>
        </div>
        <div class="login-form-panel">
            {{-- El resto del archivo login.blade.php se mantiene igual que en la respuesta anterior... --}}
            <div class="form-wrapper">
                <h3 class="text-3xl font-bold mb-6 text-center text-gray-800">Iniciar Sesión</h3>
                 @if (session('status'))
                    <div class="status-message mb-4">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <label for="email" class="form-label">Correo Electrónico:</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="form-input">
                        @error('email') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                    <div class="mt-6">
                        <label for="password" class="form-label">Contraseña:</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password" class="form-input">
                        @error('password') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                    <div class="block mt-6">
                        <label for="remember_me" style="display:inline-flex; align-items:center;">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <span style="margin-left: 0.5rem; font-size: 1.1rem; color: #4b5563;">Recordarme</span>
                        </label>
                    </div>
                    <div style="display:flex; align-items:center; justify-content:space-between; margin-top: 2rem;">
                        @if (Route::has('password.request'))
                            <a class="text-lg text-blue-600 hover:underline" href="{{ route('password.request') }}">
                                ¿Olvidaste tu contraseña?
                            </a>
                        @endif
                        <button type="submit" class="form-button" style="margin-left: 1rem;">
                            Entrar
                        </button>
                    </div>
                     <div style="text-align: center; margin-top: 2rem;">
                        <p style="font-size: 1.1rem; color: #4b5563;">
                            ¿No tienes una cuenta?
                            <a href="{{ route('register') }}" class="font-bold text-blue-600 hover:underline">
                                Regístrate aquí
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>