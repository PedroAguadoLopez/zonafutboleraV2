@extends('layouts.app')

@section('content')
    <div class="hero">
        <img src="{{ asset('images/portada.jpg') }}" alt="Estadio de fútbol lleno de aficionados animando">
        <div class="hero-text-overlay">
            <h2>Viste la pasión de tu equipo</h2>
            <p>En Zona Futbolera ofrecemos las mejores camisetas retro y actuales del mundo del fútbol. Calidad garantizada para los verdaderos aficionados al deporte rey.</p>
        </div>
    </div>

    <div class="container">
        <h3>¿Por qué elegirnos?</h3>
        <div class="features">
            <div class="feature-card">
                <h4>Calidad Premium</h4>
                <p>Telas transpirables de alta tecnología.</p>
            </div>
            <div class="feature-card">
                <h4>Envíos Gratuitos</h4>
                <p>A toda la península, rápido y seguro.</p>
            </div>
            <div class="feature-card">
                <h4>Personalización Oficial</h4>
                <p>Nombre y dorsal con tipografía original.</p>
            </div>
            <div class="feature-card">
                <h4>Autenticidad</h4>
                <p>Licencias 100% auténticas de club.</p>
            </div>
        </div>
    </div>
@endsection