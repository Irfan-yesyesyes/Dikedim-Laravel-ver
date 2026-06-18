<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Dikedim'))</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Icon Font -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50" x-data="{ sidebarOpen: false }">
        <div class="min-h-screen flex">
            <!-- Sidebar -->
            @include('layouts.sidebar')

            <!-- Main Content -->
            <div class="flex-1 flex flex-col">
                <!-- Top Navigation -->
                @include('layouts.navigation')

                <!-- Page Content -->
                <main class="flex-1">
                    @yield('content')
                </main>

                <!-- Footer -->
                <footer class="bg-white border-t border-gray-200 py-4 px-6 text-center text-sm text-gray-500">
                    <p>&copy; {{ date('Y') }} Dikedim Inventory System. All rights reserved.</p>
                </footer>
            </div>
        </div>
    </body>
</html>
