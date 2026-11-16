<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'POLYTHRIFT') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxStyles
</head>
<body class="min-h-screen flex flex-col bg-[#EBF3FA] text-slate-800 antialiased">

    <!-- Navbar -->
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur border-b border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between gap-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center font-extrabold tracking-tight text-xl text-[#1D4ED8]">
                <span>POLY<span class="text-slate-900">THRIFT</span></span>
            </a>

            <!-- Navigation Links -->
            <nav class="hidden md:flex items-center gap-6 text-sm font-medium text-slate-600">
                <a href="{{ route('home') }}" class="hover:text-[#1D4ED8] transition">Beranda</a>
                <a href="#produk" class="hover:text-[#1D4ED8] transition">Produk</a>
                <a href="#tentang" class="hover:text-[#1D4ED8] transition">Tentang Kami</a>
            </nav>

            <!-- Search & Auth Menu -->
            <div class="flex items-center gap-3">
                <form action="{{ route('home') }}" method="GET" class="hidden sm:block">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari produk..."
                        class="w-48 lg:w-64 rounded-full border border-slate-200 bg-slate-50 px-4 py-1.5 text-sm focus:border-[#1D4ED8] focus:bg-white focus:outline-none"
                    >
                </form>

                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-slate-700 hover:text-[#1D4ED8]">
                        {{ auth()->user()->name }}
                    </a>
                @else
                    <a href="{{ route('login') }}" class="rounded-lg bg-[#1D4ED8] px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700 transition">
                        Masuk
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-sm text-slate-500">
            <div class="font-bold text-[#1D4ED8]">POLYTHRIFT</div>
            <div class="flex items-center gap-6">
                <a href="#tentang" class="hover:text-slate-800">Tentang Kami</a>
                <a href="#kontak" class="hover:text-slate-800">Kontak</a>
                <a href="#" class="hover:text-slate-800">Instagram</a>
            </div>
            <div>&copy; {{ date('Y') }} Polythrift. All rights reserved.</div>
        </div>
    </footer>

    @fluxScripts
</body>
</html>