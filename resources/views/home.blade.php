{{-- 📌IA utilisé pour adapté la page home.blade.php au couleur de OMUZI --}}

<x-default-layout>
    <x-slot:title>
        {{ __('ui.home.title') }}
    </x-slot>

    <x-slot:description>
        {{ __('ui.home.description') }}
    </x-slot>

    <h1 class="text-2xl font-bold text-[#3F2A20]">
        {{ config('app.name') }}
    </h1>

    <p class="mt-4 text-[#3F2A20]">
        {{ __('ui.home.introduction', ['app_name' => config('app.name')]) }}
    </p>

    <h2 class="mt-8 text-xl font-bold text-[#3F2A20]">
        {{ __('ui.home.recent_posts') }}
    </h2>

    <div class="mt-8 space-y-6">
        @foreach ($posts as $post)
            <x-post-card :post="$post" />
        @endforeach
    </div>

    <a href="{{ url('/posts') }}"
        class="mt-6 block w-full rounded-md bg-[#3F2A20] px-4 py-2 text-center text-[#FBF2E4] hover:bg-[#7C4A2D]">
        {{ __('ui.home.see_all_posts') }}
    </a>

    <a href="{{ url('/routines') }}"
        class="mt-3 block w-full rounded-md bg-[#EABF77] px-4 py-2 text-center text-[#3F2A20] hover:bg-[#E2B7A0]">
        Voir les routines
    </a>
</x-default-layout>