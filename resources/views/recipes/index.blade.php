<x-app-layout>

    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">

        @forelse ($recipes as $recipe)
            <article class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">

                {{-- Image --}}
                @if ($recipe->image)
                    <img
                        src="{{ asset('storage/' . $recipe->image) }}"
                        alt="{{ $recipe->title }}"
                        class="h-48 w-full object-cover">
                @else
                    <div class="h-48 bg-amber-100 flex items-center justify-center text-amber-600">
                        No image
                    </div>
                @endif

                <div class="p-6">

                    {{-- Title --}}
                    <h2 class="text-xl font-semibold mb-2">
                        {{ $recipe->title }}
                    </h2>

                    {{-- Excerpt --}}
                    <p class="text-gray-600 text-sm mb-4">
                        {{ $recipe->excerpt }}
                    </p>

                    {{-- Footer --}}
                    <div class="flex justify-between items-center text-sm">

                        <span class="text-gray-500">
                            By {{ $recipe->user?->name ?? 'Unknown' }}
                        </span>

                        <a href="{{ route('recipes.show', $recipe) }}"
                           class="text-amber-600 font-semibold hover:underline">
                            View →
                        </a>

                    </div>

                </div>
            </article>

        @empty
            <p class="text-gray-500">
                No recipes yet.
            </p>
        @endforelse

    </div>

    <div class="mt-10">
        {{ $recipes->links() }}
    </div>

</x-app-layout>
