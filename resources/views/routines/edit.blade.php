{{-- 📌 Page entièrement faite à l'IA, très honnètement je voulais pas perdre du temps avec l'implémentation de cette page. j'ai donc donner le dossier views/posts/* afin que l'IA puisse me refaire les fichier.blade.php selon le reste de l'application et au couleur de mon application --}}
<x-default-layout>
    <div class="container mx-auto px-4 py-6 text-[#3F2A20]">
        <article class="rounded-lg border border-[#E2B7A0] bg-white p-6 shadow-md">
            <header class="mb-6">
                <h1 class="text-3xl font-bold text-[#3F2A20]">
                    Modifier la routine
                </h1>

                <p class="mt-3 text-[#7C4A2D]">
                    Mets à jour les informations de ta routine capillaire.
                </p>
            </header>

            <form method="POST" action="{{ url('/routines/' . $routine->id) }}" class="space-y-5">
                @csrf
                @method('PATCH')

                <div>
                    <label for="title" class="mb-2 block font-medium text-[#3F2A20]">
                        Titre
                    </label>

                    <input type="text" name="title" id="title" value="{{ old('title', $routine->title) }}"
                        class="w-full rounded-md border border-[#E2B7A0] bg-[#FBF2E4] p-2 text-[#3F2A20] focus:border-[#7C4A2D] focus:ring-[#7C4A2D]">

                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="mb-2 block font-medium text-[#3F2A20]">
                        Description
                    </label>

                    <textarea name="description" id="description" rows="4"
                        class="w-full rounded-md border border-[#E2B7A0] bg-[#FBF2E4] p-2 text-[#3F2A20] focus:border-[#7C4A2D] focus:ring-[#7C4A2D]">{{ old('description', $routine->description) }}</textarea>

                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="steps" class="mb-2 block font-medium text-[#3F2A20]">
                        Étapes
                    </label>

                    <textarea name="steps" id="steps" rows="5"
                        class="w-full rounded-md border border-[#E2B7A0] bg-[#FBF2E4] p-2 text-[#3F2A20] focus:border-[#7C4A2D] focus:ring-[#7C4A2D]">{{ old('steps', $routine->steps) }}</textarea>

                    @error('steps')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <p class="mb-2 block font-medium text-[#3F2A20]">
                        Types de cheveux
                    </p>

                    <div class="grid grid-cols-2 gap-2 rounded-md border border-[#E2B7A0] bg-[#FBF2E4] p-4 sm:grid-cols-3">
                        @foreach (['2A', '2B', '2C', '3A', '3B', '3C', '4A', '4B', '4C'] as $hairType)
                            <label class="flex items-center gap-2 text-[#3F2A20]">
                                <input type="checkbox" name="hair_types[]" value="{{ $hairType }}"
                                    class="rounded border-[#E2B7A0] text-[#7C4A2D] focus:ring-[#7C4A2D]"
                                    {{ in_array($hairType, old('hair_types', $routine->hair_types ?? [])) ? 'checked' : '' }}>
                                <span>{{ $hairType }}</span>
                            </label>
                        @endforeach
                    </div>

                    @error('hair_types')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="frequency" class="mb-2 block font-medium text-[#3F2A20]">
                        Fréquence
                    </label>

                    <input type="text" name="frequency" id="frequency"
                        value="{{ old('frequency', $routine->frequency) }}"
                        class="w-full rounded-md border border-[#E2B7A0] bg-[#FBF2E4] p-2 text-[#3F2A20] focus:border-[#7C4A2D] focus:ring-[#7C4A2D]">

                    @error('frequency')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <footer class="flex items-center justify-between border-t border-[#E2B7A0] pt-4">
                    <a href="{{ url('/routines/' . $routine->id) }}"
                        class="rounded-md bg-[#EABF77] px-4 py-2 text-[#3F2A20] hover:bg-[#E2B7A0]">
                        Annuler
                    </a>

                    <button type="submit"
                        class="rounded-md bg-[#7C4A2D] px-4 py-2 text-[#FBF2E4] hover:bg-[#3F2A20]">
                        Mettre à jour
                    </button>
                </footer>
            </form>
        </article>
    </div>
</x-default-layout>