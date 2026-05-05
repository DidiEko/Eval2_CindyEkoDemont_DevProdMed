{{-- 📌 Page entièrement faite à l'IA, très honnètement je voulais pas perdre du temps avec l'implémentation de cette page. j'ai donc donner le dossier views/posts/* afin que l'IA puisse me refaire les fichier.blade.php selon le reste de l'application et au couleur de mon application --}}

<x-default-layout>
    <div class="container mx-auto px-4 py-6 text-[#3F2A20]">
        <article class="rounded-lg border border-[#E2B7A0] bg-white p-6 shadow-md">
            <header class="mb-6">
                <h1 class="text-3xl font-bold text-[#3F2A20]">
                    {{ $routine->title }}
                </h1>

                <p class="mt-3 text-sm text-[#7C4A2D]">
                    Créée par {{ $routine->user->username ?? $routine->user->name ?? 'Utilisateur' }}
                </p>
            </header>

            <div class="space-y-4">
                <div class="rounded-md bg-[#FBF2E4] p-4">
                    <p>
                        <strong>Types de cheveux :</strong>
                        {{ implode(', ', $routine->hair_types ?? []) }}
                    </p>

                    <p class="mt-2">
                        <strong>Fréquence :</strong>
                        {{ $routine->frequency ?? 'Non précisée' }}
                    </p>
                </div>

                <div>
                    <h2 class="mb-2 text-xl font-bold text-[#3F2A20]">
                        Description
                    </h2>

                    <p class="text-[#3F2A20]">
                        {{ $routine->description }}
                    </p>
                </div>

                <div>
                    <h2 class="mb-2 text-xl font-bold text-[#3F2A20]">
                        Étapes
                    </h2>

                    <p class="whitespace-pre-line text-[#3F2A20]">
                        {{ $routine->steps }}
                    </p>
                </div>
            </div>
            
            @auth
                @if ($routine->user_id === auth()->id())
                    <footer class="mt-6 flex flex-wrap gap-3 border-t border-[#E2B7A0] pt-4">
                        <a href="{{ url('/routines/' . $routine->id . '/edit') }}"
                            class="rounded-md bg-[#EABF77] px-4 py-2 text-[#3F2A20] hover:bg-[#E2B7A0]">
                            Modifier
                        </a>

                        <form method="POST" action="{{ url('/routines/' . $routine->id) }}">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="rounded-md bg-red-600 px-4 py-2 text-white hover:bg-red-700">
                                Supprimer
                            </button>
                        </form>
                    </footer>
                @endif
            @endauth
        </article>
    </div>
</x-default-layout>