<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'High Card Enjoyer')</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Ícono --}}
    <link rel="icon" href="{{ Vite::asset('resources/images/Icono.png') }}" type="image/x-icon">

    {{-- CSS y JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body 
    class="light-mode d-flex flex-column min-vh-100"
    data-dark-img="{{ Vite::asset('resources/images/Titulo_Blanco.png') }}"
    data-light-img="{{ Vite::asset('resources/images/Titulo-Negro.png') }}"
>

    {{-- Header --}}
    @include('partials.header')

    {{-- Navbar (solo si existe el archivo) --}}
    @includeWhen(View::exists('partials.navbar'), 'partials.navbar')

    {{-- Contenido principal --}}
    <main class="container my-5 flex-grow-1">
        @yield('content')
    </main>

    {{-- Footer (solo si existe el archivo) --}}
    @includeWhen(View::exists('partials.footer'), 'partials.footer')

    {{-- Script opcional para modo oscuro --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const body = document.body;
            const storedTheme = localStorage.getItem('theme');
            if (storedTheme) {
                body.classList.remove('light-mode', 'dark-mode');
                body.classList.add(storedTheme);
            }

            const toggleBtn = document.getElementById("modeToggle");
            if (toggleBtn) {
                toggleBtn.addEventListener("click", () => {
                    const newTheme = body.classList.contains('light-mode') ? 'dark-mode' : 'light-mode';
                    body.classList.remove('light-mode', 'dark-mode');
                    body.classList.add(newTheme);
                    localStorage.setItem('theme', newTheme);
                });
            }
        });
    </script>

</body>
</html>
