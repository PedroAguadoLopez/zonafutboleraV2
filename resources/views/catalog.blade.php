@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Nuestro Catálogo</h2>
        <p>Descubre nuestra selección de camisetas históricas y de la temporada actual. Viste los colores de tus ídolos.</p>
        
        <div class="product-grid">
            <div class="product-card">
                <img src="{{ asset('images/espana2010.avif') }}" alt="Camiseta Selección Española 2010">
                <div class="product-card-content">
                    <h3>España 2010 Local</h3>
                    <p>La mítica camiseta con la que levantamos la Copa del Mundo en Sudáfrica. Un pedazo de historia.</p>
                </div>
            </div>
            
            <div class="product-card">
                <img src="{{ asset('images/algeciras.png') }}" alt="Camiseta Algeciras CF">
                <div class="product-card-content">
                    <h3>Algeciras CF 2025/2026</h3>
                    <p>Apoya al equipo rojiblanco con la primera equipación oficial de esta temporada.</p>
                </div>
            </div>
            
            <div class="product-card">
                <img src="{{ asset('images/milan1989.webp') }}" alt="Camiseta Retro AC Milan 1989">
                <div class="product-card-content">
                    <h3>AC Milan 1989 Retro</h3>
                    <p>Diseño clásico de la gloriosa época del fútbol italiano. Patrocinador original incluido.</p>
                </div>
            </div>
        </div>
    </div>
@endsection