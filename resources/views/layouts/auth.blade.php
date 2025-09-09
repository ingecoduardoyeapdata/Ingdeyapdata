<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Ingdeyapdata - Acceso')</title>

    {{-- Enlaza el CSS de autenticación --}}
    <link rel="stylesheet" href="{{ asset('css/styleLoginIniciarSesion.css') }}">
</head>
<body class="dw-auth-body">

    <main class="dw-auth-main">
        <div class="dw-auth-card animate-in">
            <header class="dw-auth-header">
                <a href="{{ url('/') }}" class="dw-logo">
                    {{-- Si no tienes logo, crea public/img/logo-deciwin.png o deja texto --}}
                    <img src="{{ asset('img/logo-deciwin.png') }}" alt="deciWin logo" onerror="this.style.display='none'">
                    <span class="dw-brand">deciWin</span>
                </a>
                <h1 class="dw-auth-title">@yield('heading')</h1>
                @if(View::hasSection('subheading'))<p class="dw-auth-sub">@yield('subheading')</p>@endif
            </header>

            <section class="dw-auth-content">
                @yield('content')
            </section>

            <footer class="dw-auth-footer">
                <small>&copy; {{ date('Y') }} Ingdeyapdata &middot; WELCOME!</small>
            </footer>
        </div>
    </main>

    {{-- Puedes añadir scripts aquí si es necesario --}}
</body>
</html>
