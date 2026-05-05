<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    @isset($description)
        <meta name="description" content="{{ $description }}">
    @endisset
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @isset($title)
        <title>{{ $title }} - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endisset

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen flex-col bg-[#FBF2E4] text-[#3F2A20]">
    <header class="bg-[#3F2A20] text-[#FBF2E4] shadow-md">
        <nav class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center gap-4">
                    <a href="{{ url('/') }}" class="block font-bold hover:text-[#EABF77] transition">
                        {{ config('app.name') }}
                    </a>

                    <a href="{{ url('/posts') }}" class="hover:text-[#EABF77] transition">
                        Posts
                    </a>

                    <a href="{{ url('/routines') }}" class="hover:text-[#EABF77] transition">
                        Routines
                    </a>

                    <a href="{{ url('/about') }}" class="hover:text-[#EABF77] transition">
                        About
                    </a>
                </div>

                @auth
                {{-- 📌Rajouter le bouton grâce à l'IA afin qu'il soit cohérent avec le reste du style--}}
                    <div class="flex items-center gap-4">
                        <a href="{{ url('/routines/create') }}" class="hover:text-[#EABF77] transition">
                            Créer une routine
                        </a>

                        <a href="{{ url('/my-profile') }}" class="block hover:opacity-80 transition">
                            <div
                                class="flex h-8 w-8 items-center justify-center overflow-hidden rounded-full bg-[#FBF2E4]">
                                @if (Auth::user()->profile_picture)
                                    <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}"
                                        alt="{{ Auth::user()->username }}" class="h-full w-full object-cover">
                                @else
                                    <img src="/icons/profile.svg" alt="{{ Auth::user()->username }}" class="h-8 w-8">
                                @endif
                            </div>
                        </a>
                    </div>
                @else
                    <div class="flex items-center gap-2">
                        <a href="{{ url('/auth/login') }}"
                            class="block rounded-md px-3 py-1 transition hover:bg-[#7C4A2D]">
                            {{ __('ui.auth.login.title') }}
                        </a>

                        <a href="{{ url('/auth/register') }}"
                            class="block rounded-md bg-[#EABF77] px-3 py-1 text-[#3F2A20] transition hover:bg-[#E2B7A0]">
                            {{ __('ui.auth.register.title') }}
                        </a>
                    </div>
                @endauth
            </div>
        </nav>
    </header>

    <main class="container mx-auto max-w-2xl flex-grow px-4 py-8 text-[#3F2A20] sm:px-6 lg:px-8">
        {{ $slot }}
    </main>

    <footer class="bg-[#3F2A20] text-sm text-[#FBF2E4]">
        <div class="container mx-auto px-4 py-6 sm:px-6 lg:px-8">
            <div class="flex h-16 flex-col items-center justify-between gap-4 sm:flex-row">
                <p class="text-center sm:text-left">
                    {{ __('ui.about.copyright', ['year' => date('Y')]) }}
                </p>

                <a href="{{ url('/about') }}" class="block hover:text-[#EABF77] transition">
                    {{ __('ui.about.title') }}
                </a>
            </div>
        </div>
    </footer>
</body>

</html>