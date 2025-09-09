@extends('layouts.auth')

@section('title', 'Registro')
@section('heading', 'Crear Cuenta')
@section('subheading', 'Empieza a usar Ingdeyapdata')

@section('content')
<form method="POST" action="{{ route('register') }}" class="form-auth" novalidate>
    @csrf

    <label class="field">
        <span>Nombre</span>
        <input id="name" name="name" type="text" value="{{ old('name') }}" required>
        @error('name') <span class="error">{{ $message }}</span> @enderror
    </label>

    <label class="field">
        <span>Correo Electrónico</span>
        <input id="email" name="email" type="email" value="{{ old('email') }}" required>
        @error('email') <span class="error">{{ $message }}</span> @enderror
    </label>

    <label class="field">
        <span>Contraseña</span>
        <input id="password" name="password" type="password" required>
        @error('password') <span class="error">{{ $message }}</span> @enderror
    </label>

    <label class="field">
        <span>Confirmar Contraseña</span>
        <input id="password_confirmation" name="password_confirmation" type="password" required>
    </label>

    <div class="actions">
        <button type="submit" class="btn-primary">Registrar</button>
    </div>

    <p class="muted">¿Ya tienes cuenta? <a href="{{ route('login') }}">Iniciar Sesión</a></p>
</form>
@endsection
