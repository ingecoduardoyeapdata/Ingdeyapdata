{{-- resources/views/layouts/main.blade.php
     Layout principal de la app "deciWin".
     - Incluye header (nav), footer y zona @yield('content').
     - Enlaza CSS/JS en public/.
     - Usa Alpine.js (CDN) para menús y pequeños comportamientos.
--}}

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>@yield('title', 'deciWin — Rifas y sorteos')</title>

    {{-- CSS principal --}}
    <link rel="stylesheet" href="{{ asset('css/deciwin.css') }}">

    {{-- Alpine.js CDN para reactividad sencilla (no requiere npm) --}}
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    {{-- JS propio --}}
    <script src="{{ asset('js/deciwin.js') }}" defer></script>
</head>
<body class="dw-body">

    {{-- Contenedor que maneja el estado global simple con Alpine (nav mobile) --}}
    <div x-data="{ mobileOpen: false }" class="dw-app">

        {{-- Header / Nav --}}
        <header class="dw-header">
            <div class="dw-container dw-header-inner">
                <a href="{{ url('/') }}" class="dw-logo">
                    {{-- Si no tienes logo, crea public/img/logo-deciwin.png o deja texto --}}
                    <img src="{{ asset('img/logo-deciwin.png') }}" alt="deciWin logo" onerror="this.style.display='none'">
                    <span class="dw-brand">deciWin</span>
                </a>

                {{-- Desktop nav --}}
                <nav class="dw-nav">
                    <a href="{{ url('/') }}" class="dw-nav-link">Inicio</a>
                    <a href="{{ url('/raffles') }}" class="dw-nav-link">Sorteos</a>
                    <a href="#how" class="dw-nav-link">Cómo funciona</a>
                    <a href="#popular" class="dw-nav-link">Populares</a>
                    <a href="#contact" class="dw-nav-link">Contacto</a>
                </nav>

                {{-- Auth links y mobile toggle --}}
                <div class="dw-actions">
                    @guest
                        <a href="{{ route('login') }}" class="dw-link small">Log in</a>
                        <a href="{{ route('register') }}" class="dw-btn-outline">Register</a>
                    @else
                        {{-- Si está autenticado mostramos nombre y logout --}}
                        <div x-data="{ open:false }" class="dw-user">
                            <button @click="open = !open" class="dw-link">
                                {{ Auth::user()->name }}
                                <svg class="dw-caret" width="12" height="12" viewBox="0 0 20 20"><path d="M5 7l5 5 5-5z" fill="currentColor"/></svg>
                            </button>
                            <div x-show="open" @click.outside="open=false" x-cloak class="dw-user-menu">
                                <a href="{{ url('/profile') }}" class="dw-user-item">Perfil</a>
                                <a href="{{ url('/tickets') }}" class="dw-user-item">Mis tickets</a>

                                {{-- Logout: formulario POST requerido en Laravel --}}
                                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dw-user-item">Cerrar sesión</button>
                                </form>
                            </div>
                        </div>
                    @endguest

                    {{-- Mobile menu button --}}
                    <button class="dw-mobile-btn" @click="mobileOpen = !mobileOpen" aria-label="Abrir menú">
                        <span class="dw-hamburger" :class="{ 'open': mobileOpen }"></span>
                    </button>
                </div>
            </div>

            {{-- Mobile nav (muestra en pantallas pequeñas) --}}
            <div class="dw-mobile" x-show="mobileOpen" x-cloak>
                <a href="{{ url('/') }}" class="dw-mobile-link">Inicio</a>
                <a href="{{ url('/raffles') }}" class="dw-mobile-link">Sorteos</a>
                <a href="#how" class="dw-mobile-link">Cómo funciona</a>
                <a href="#popular" class="dw-mobile-link">Populares</a>

                <div class="dw-mobile-auth">
                    @guest
                        <a href="{{ route('login') }}" class="dw-mobile-link">Log in</a>
                        <a href="{{ route('register') }}" class="dw-mobile-link">Register</a>
                    @else
                        <a href="{{ url('/profile') }}" class="dw-mobile-link">Perfil</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dw-mobile-link" type="submit">Cerrar sesión</button>
                        </form>
                    @endguest
                </div>
            </div>
        </header>

        {{-- Main content (cada vista llenará esta sección) --}}
        <main class="dw-main">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="dw-footer">
            <div class="dw-container">
                <div class="dw-footer-grid">
                    <div>
                        <strong>deciWin</strong>
                        <p>Participa, gana y celebra. Rifas seguras y transparentes.</p>
                    </div>
                    <div>
                        <h4>Enlaces</h4>
                        <a href="{{ url('/terms') }}">Términos</a><br>
                        <a href="{{ url('/privacy') }}">Privacidad</a>
                    </div>
                    <div>
                        <h4>Contacto</h4>
                        <a href="mailto:soporte@deciwin.example">soporte@deciwin.example</a>
                    </div>
                </div>

                <div class="dw-footer-bottom">
                    <small>&copy; {{ date('Y') }} deciWin. Todos los derechos reservados.</small>
                </div>
            </div>
        </footer>
    </div> {{-- .dw-app --}}
</body>
</html>
