@extends('layouts.auth')

@section('title', 'Iniciar Sesión')
@section('heading', 'Iniciar Sesión')
@section('subheading', 'Bienvenido de vuelta')

@section('content')
<form method="POST" action="{{ route('login') }}" class="form-auth" novalidate>
    @csrf

    <label class="field">
        <span>Correo Electrónico</span>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        @error('email') <span class="error">{{ $message }}</span> @enderror
    </label>

    <label class="field">
        <span>Contraseña</span>
        <input id="password" type="password" name="password" required>
        @error('password') <span class="error">{{ $message }}</span> @enderror
    </label>

    <label class="checkbox">
        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
        <span>Recordarme</span>
    </label>

    <div class="actions">
        <a href="{{ route('password.request') }}" class="link-small">¿Olvidaste tu contraseña?</a>
        <button type="submit" class="btn-primary">Iniciar Sesión</button>
    </div>

    <p class="muted">¿No tienes cuenta? <a href="{{ route('register') }}">Crear Cuenta</a></p>
</form>
@endsection
