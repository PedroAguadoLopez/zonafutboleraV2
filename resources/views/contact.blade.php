@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Contacta con nosotros</h2>
        <p>¿Tienes dudas sobre la talla de tu pedido o buscas una camiseta de una temporada específica? Estamos aquí para ayudarte.</p>
        
        <div class="contact-layout">
            <div class="contact-photo-container">
                <img class="contact-photo" src="{{ asset('images/tienda.jpg') }}" alt="Nuestra tienda física llena de camisetas">
            </div>
            
            <div class="contact-info-container">
                <h3>Nuestros datos</h3>
                <ul>
                    <li><b>Email:</b> atencion@zonafutbolera.es</li>
                    <li><b>Teléfono:</b> 956 12 34 56</li>
                    <li><b>Dirección:</b> La Menacha, Local 4</li>
                </ul>
                
                <p>También puedes seguir los resultados de tus equipos favoritos en la <a href="https://www.laliga.com/" target="_blank">página oficial de La Liga</a>.</p>
            </div>
        </div>
    </div>
@endsection