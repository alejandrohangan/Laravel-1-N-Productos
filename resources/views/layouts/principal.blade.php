<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('titulo', 'Mi Aplicación Laravel')</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body class="bg-white min-h-screen flex flex-col">
    <!-- Header minimalista fijo -->
    <header class="fixed w-full bg-white/80 backdrop-blur-md border-b border-gray-100 z-50">
        <div class="max-w-6xl mx-auto">
            <nav class="flex items-center justify-between h-16 px-6">
                <a href="{{route('home.index')}}" class="text-gray-900 text-lg font-medium">
                    Inicio
                </a>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{route('products.index')}}" class="text-gray-500 hover:text-gray-900">Productos</a>
                    <a href="{{route('categories.index')}}" class="text-gray-500 hover:text-gray-900">Categorias</a>
                </div>

                <button class="md:hidden text-gray-500 hover:text-gray-900">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </nav>
        </div>
    </header>

    <!-- Espaciador para el header fijo -->
    <div class="h-16"></div>

    <!-- Título de la página -->
    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-6">
            <h1 class="text-4xl md:text-5xl text-gray-900 font-light text-center tracking-tight">
                @yield('cabecera', 'Bienvenido')
            </h1>
        </div>
    </section>

    <!-- Contenido principal -->
    <main class="flex-grow">
        <div class="max-w-6xl mx-auto px-6 py-8">
            @yield('contenido')
        </div>
    </main>

    <x-alertas>
        
    </x-alertas>

    <!-- Footer minimalista -->
    <footer class="bg-gray-50 py-12">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-sm text-gray-500">
                    &copy; {{ date('Y') }} Mi Aplicación
                </div>
                <div class="md:text-center">
                    <a href="#" class="text-sm text-gray-500 hover:text-gray-900">Política de privacidad</a>
                </div>
                <div class="md:text-right">
                    <a href="#" class="text-sm text-gray-500 hover:text-gray-900">Términos de uso</a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>