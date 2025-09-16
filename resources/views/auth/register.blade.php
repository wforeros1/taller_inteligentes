<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Registro - Asistente de Salud</title>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
{{-- Usamos la misma clase 'login-page' para reutilizar los estilos --}}
<body class="login-page">
    <div class="login-container">
        <div class="login-promo-panel">
            <div class="promo-content">
                <h1 class="promo-icon">👵👴</h1>
                <h2 class="promo-title">Asistente de Salud</h2>
                <p class="promo-text">Crea tu cuenta para empezar a cuidar tu bienestar de forma sencilla y organizada.</p>
            </div>
        </div>

        <div class="login-form-panel">
            <div class="form-wrapper">
                <h3 class="text-3xl font-bold mb-6 text-center text-gray-800">Crear Cuenta</h3>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div>
                        <label for="name" class="form-label">Nombre Completo:</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="form-input">
                        @error('name') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    <div class="mt-6">
                        <label for="email" class="form-label">Correo Electrónico:</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="form-input">
                        @error('email') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    <div class="mt-6">
                        <label for="password" class="form-label">Contraseña:</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password" class="form-input">
                        @error('password') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="mt-6">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña:</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="form-input">
                        @error('password_confirmation') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex items-center justify-end mt-8">
                        <a class="text-lg text-blue-600 hover:underline" href="{{ route('login') }}">
                            ¿Ya tienes una cuenta?
                        </a>

                        <button type="submit" class="form-button ml-4">
                            Registrarse
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>