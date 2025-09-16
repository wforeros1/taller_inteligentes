<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido - Asistente de Salud</title>
    {{-- Solo cargamos nuestro CSS personalizado para esta página --}}
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
{{-- Añadimos una clase única para aislar los estilos de esta página --}}
<body class="welcome-page">
    <div class="welcome-container">
        <div class="welcome-content">
            <h1 class="welcome-icon">👵👴</h1>
            <h2 class="welcome-title">Asistente de Salud</h2>
            <p class="welcome-tagline">Tu compañero digital para el seguimiento de medicamentos y salud diaria.</p>

            <div class="welcome-actions">
                {{-- Si el usuario ya inició sesión, muéstrale un enlace al dashboard --}}
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary welcome-button">Ir al Panel</a>
                @else
                {{-- Si no, muéstrale los botones de Iniciar Sesión y Registrarse --}}
                    <a href="{{ route('login') }}" class="btn btn-primary welcome-button">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="btn btn-secondary welcome-button">Registrarse</a>
                @endauth
            </div>
        </div>
    </div>
</body>
</html>