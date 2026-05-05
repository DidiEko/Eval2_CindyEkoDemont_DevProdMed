<article class="rounded-lg border border-[#E2B7A0] bg-white p-6 shadow-md text-[#3F2A20]">
    <header class="mb-4">
        <div class="mb-3 flex items-center gap-3">
            <a href="{{ url('@' . $post->user->username) }}">
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-full bg-[#7C4A2D] font-semibold text-[#FBF2E4] hover:bg-[#3F2A20]">
                    {{ strtoupper(substr($post->user->first_name, 0, 1) . substr($post->user->last_name, 0, 1)) }}
                </div>
            </a>

            <div>
                <a href="{{ url('@' . $post->user->username) }}" class="hover:text-[#7C4A2D]">
                    <p class="font-semibold text-[#3F2A20]">
                        {{ $post->user->first_name }} {{ $post->user->last_name }}
                    </p>
                </a>

                <p class="text-sm text-[#7C4A2D]" title="{{ $post->created_at->isoFormat('LLLL') }}">
                    {{ $post->created_at->diffForHumans() }}
                </p>
            </div>
        </div>

        @if ($post->title)
            <a href="{{ url('/posts/' . $post->id) }}">
                <h2 class="text-xl font-bold text-[#3F2A20] hover:text-[#7C4A2D]">
                    {{ $post->title }}
                </h2>
            </a>
        @endif
    </header>

    <div class="mb-4 space-y-3">
        @if ($post->hair_types)
            <p class="rounded-md bg-[#FBF2E4] px-3 py-2 text-sm text-[#7C4A2D]">
                <strong>Types de cheveux :</strong>
                {{ implode(', ', $post->hair_types ?? []) }}
            </p>
        @endif

        <a href="{{ url('/posts/' . $post->id) }}">
            <p class="text-[#3F2A20]">
                {{ $post->content }}
            </p>
        </a>
    </div>

    <footer class="border-t border-[#E2B7A0] pt-4">
        <div class="flex items-center justify-between text-sm text-[#7C4A2D]">
            <a href="{{ url('/posts/' . $post->id) }}" class="font-semibold hover:text-[#3F2A20]">
                {{ trans_choice('ui.posts.likes_count', count($post->likes)) }}
            </a>

            <a href="{{ url('/posts/' . $post->id) }}"
                class="rounded-md bg-[#7C4A2D] px-4 py-2 text-[#FBF2E4] hover:bg-[#3F2A20]">
                {{ __('ui.posts.view_post') }}
            </a>
        </div>
    </footer>
</article>