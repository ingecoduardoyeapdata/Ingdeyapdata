<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'Ingdeyapdata - Acceso')</title>
    <link rel="stylesheet" href="{{ asset('css/natura.css') }}">
</head>
<body class="auth-body">

    <div class="auth-bg" aria-hidden="true"></div>

    <main class="auth-main">
        <div class="auth-card animate-in">
            <header class="auth-header">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="auth-logo" onerror="this.style.display='none'">
                <h1>@yield('heading')</h1>
                @if(View::hasSection('subheading'))<p class="auth-sub">@yield('subheading')</p>@endif
            </header>

            <section class="auth-content">
                @yield('content')
            </section>

            <footer class="auth-footer">
                <small>Ingdeyapdata &middot; WELCOME!</small>
            </footer>
        </div>
    </main>

    <script src="{{ asset('js/auth.js') }}"></script>
</body>
</html>
