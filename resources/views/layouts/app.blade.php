<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zona Futbolera</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>Zona Futbolera</h1>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Inicio</a></li>
                <li><a href="{{ route('catalog') }}">Catálogo</a></li>
                <li><a href="{{ route('contact') }}">Contacto</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        @yield('content')
    </main>
    
    <footer>
        <p>&copy; 2026 Zona Futbolera. Pasión por el fútbol.</p>
        <p>Consulta el reglamento oficial en la <a href="https://es.uefa.com/" target="_blank">web de la UEFA</a>.</p>
    </footer>
</body>
</html>