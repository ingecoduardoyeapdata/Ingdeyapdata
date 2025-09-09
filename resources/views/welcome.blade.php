{{-- resources/views/welcome.blade.php
     Homepage de deciWin — extiende layouts.main
--}}

@extends('layouts.main')

@section('title','deciWin — Rifas y sorteos')

@section('content')
<section class="dw-hero">
    <div class="dw-container dw-hero-inner">
        <div class="dw-hero-left">
            <h1 class="dw-hero-title">deciWin — participa y gana rifas de forma segura</h1>
            <p class="dw-hero-lead">Descubre sorteos, elige tus números y participa. Transparencia, seguridad y experiencias que emocionan.</p>

            <div class="dw-hero-cta">
                <a href="{{ url('/raffles') }}" class="dw-btn-primary">Explorar Sorteos</a>
                <a href="#how" class="dw-btn-ghost">¿Cómo funciona?</a>
            </div>
        </div>

        <div class="dw-hero-right">
            {{-- Imagen / tarjeta destacada --}}
            <div class="dw-card">
                <img src="{{ asset('img/iniciologin7.jpg') }}" alt="Sorteo destacado" onerror="this.style.display='none'">
                <div class="dw-card-body">
                    <h3>Sorteo destacado: Moto XZ</h3>
                    <p>Valor aproximado: $3,000 — Fecha estimada: 25/12/2025</p>
                    <a href="{{ url('/raffles/1/select') }}" class="dw-btn-outline">Participar ahora</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="how" class="dw-section">
    <div class="dw-container">
        <h2 class="dw-section-title">¿Cómo funciona?</h2>

        <div class="dw-grid-3">
            <div class="dw-step">
                <div class="dw-step-icon">🔎</div>
                <h4>1. Descubre</h4>
                <p>Explora sorteos por categoría y premios.</p>
            </div>
            <div class="dw-step">
                <div class="dw-step-icon">🎯</div>
                <h4>2. Elige</h4>
                <p>Selecciona hasta 4 números por participación.</p>
            </div>
            <div class="dw-step">
                <div class="dw-step-icon">🏆</div>
                <h4>3. Gana</h4>
                <p>Si tu combinación es la ganadora, cobras el premio.</p>
            </div>
        </div>
    </div>
</section>

<section id="popular" class="dw-section dw-section-alt">
    <div class="dw-container">
        <h2 class="dw-section-title">Sorteos Populares</h2>

        {{-- Si en el controlador pasas $raffles, puedes iterarlos; si no, mostramos ejemplos estáticos --}}
        @isset($raffles)
            <div class="dw-grid-3">
                @foreach($raffles as $raffle)
                    <article class="dw-card">
                        <img src="{{ asset($raffle->image ?? 'img/raffle-placeholder.jpg') }}" alt="{{ $raffle->title }}" onerror="this.style.display='none'">
                        <div class="dw-card-body">
                            <h3>{{ $raffle->title }}</h3>
                            <p class="muted">Valor aproximado: {{ $raffle->value ?? '---' }}</p>
                            <a href="{{ route('raffles.show', $raffle->id) }}" class="dw-btn-outline">Ver</a>
                            <a href="{{ route('raffles.select', $raffle->id) }}" class="dw-btn-primary">Participar</a>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            {{-- Placeholder estático --}}
            <div class="dw-grid-3">
                <article class="dw-card">
                    <img src="{{ asset('img/raffle-placeholder.jpg') }}" alt="Premio 1" onerror="this.style.display='none'">
                    <div class="dw-card-body">
                        <h3>Moto deportiva</h3>
                        <p class="muted">Valor: $3,000 — Sorteo: 25/12/2025</p>
                        <a href="{{ url('/raffles/1') }}" class="dw-btn-outline">Ver</a>
                        <a href="{{ url('/raffles/1/select') }}" class="dw-btn-primary">Participar</a>
                    </div>
                </article>

                <article class="dw-card">
                    <img src="{{ asset('img/raffle-placeholder-2.jpg') }}" alt="Premio 2" onerror="this.style.display='none'">
                    <div class="dw-card-body">
                        <h3>Electrodomésticos</h3>
                        <p class="muted">Valor: $800 — Sorteo: 01/11/2025</p>
                        <a href="{{ url('/raffles/2') }}" class="dw-btn-outline">Ver</a>
                        <a href="{{ url('/raffles/2/select') }}" class="dw-btn-primary">Participar</a>
                    </div>
                </article>

                <article class="dw-card">
                    <img src="{{ asset('img/raffle-placeholder-3.jpg') }}" alt="Premio 3" onerror="this.style.display='none'">
                    <div class="dw-card-body">
                        <h3>Bono en efectivo</h3>
                        <p class="muted">Valor: $1,200 — Sorteo: 30/10/2025</p>
                        <a href="{{ url('/raffles/3') }}" class="dw-btn-outline">Ver</a>
                        <a href="{{ url('/raffles/3/select') }}" class="dw-btn-primary">Participar</a>
                    </div>
                </article>
            </div>
        @endisset
    </div>
</section>

<section id="contact" class="dw-section">
    <div class="dw-container">
        <h2 class="dw-section-title">Contacto</h2>
        <p>¿Dudas? Escribe a <a href="mailto:soporte@deciwin.example">soporte@deciwin.example</a></p>
    </div>
</section>
@endsection
