{{-- 📌 Page entièrement faite à l'IA, très honnètement je voulais pas perdre du temps avec l'implémentation de cette page. j'ai donc donner le dossier views/posts/* afin que l'IA puisse me refaire les fichier.blade.php selon le reste de l'application et au couleur de mon application --}}

<x-default-layout>
    <div class="container mx-auto px-4 py-6 text-[#3F2A20]">
        <div class="mb-6 flex items-center justify-between">
            <h1 class="text-3xl font-bold text-[#3F2A20]">
                Routines capillaires
            </h1>

            @auth
                <a href="{{ url('/routines/create') }}"
                    class="rounded-md bg-[#7C4A2D] px-4 py-2 text-[#FBF2E4] hover:bg-[#3F2A20]">
                    Ajouter une routine
                </a>
            @endauth
        </div>

        <div class="space-y-6">
            @forelse ($routines as $routine)
                <article class="rounded-lg border border-[#E2B7A0] bg-white p-6 shadow-md text-[#3F2A20]">
                    <h2 class="mb-2 text-2xl font-bold">
                        <a href="{{ url('/routines/' . $routine->id) }}"
                            class="text-[#3F2A20] hover:text-[#7C4A2D]">
                            {{ $routine->title }}
                        </a>
                    </h2>

                    <div class="space-y-2 text-[#3F2A20]">
                        <p>
                            <strong>Types de cheveux :</strong>
                            {{ implode(', ', $routine->hair_types ?? []) }}
                        </p>

                        <p>
                            <strong>Fréquence :</strong>
                            {{ $routine->frequency ?? 'Non précisée' }}
                        </p>

                        <p class="mt-3">
                            {{ $routine->description }}
                        </p>
                    </div>

                    <div class="mt-4 flex flex-wrap items-center gap-3">
                        <a href="{{ url('/routines/' . $routine->id) }}"
                            class="inline-block rounded-md bg-[#7C4A2D] px-4 py-2 text-[#FBF2E4] hover:bg-[#3F2A20]">
                            Voir la routine
                        </a>

                    </div>

                    <footer class="mt-4 border-t border-[#E2B7A0] pt-3">
                        <p class="text-sm text-[#7C4A2D]">
                            Par {{ $routine->user->username ?? $routine->user->name ?? 'Utilisateur' }}
                        </p>
                    </footer>
                </article>
            @empty
                <p class="rounded-lg border border-[#E2B7A0] bg-white p-6 text-[#3F2A20]">
                    Aucune routine pour le moment.
                </p>
            @endforelse
        </div>
    </div>
</x-default-layout>