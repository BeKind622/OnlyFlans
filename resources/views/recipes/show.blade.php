<x-app-layout>
    <article class="bg-white rounded-lg shadow p-8">

        <h1 class="text-3xl font-bold mb-4">
            {{ $recipe->title }}
        </h1>

        <p class="text-gray-500 mb-6">
            By {{ $recipe->user->name }} · {{ $recipe->created_at->diffForHumans() }}
        </p>

        @if ($recipe->image)
            <img src="{{ asset('storage/' . $recipe->image) }}"
                 class="w-full h-80 object-cover rounded mb-6">
        @endif

        <div class="prose max-w-none">
            {!! nl2br(e($recipe->body)) !!}
        </div>

        @auth
            @can('update', $recipe)
                <div class="mt-8 flex gap-4">
                    <a href="{{ route('recipes.edit', $recipe) }}"
                       class="px-4 py-2 bg-blue-600 text-white rounded">
                        Edit
                    </a>

                    @can('delete', $recipe)
                        <form method="POST" action="{{ route('recipes.destroy', $recipe) }}">
                            @csrf
                            @method('DELETE')
                            <button class="px-4 py-2 bg-red-600 text-white rounded">
                                Delete
                            </button>
                        </form>
                    @endcan
                </div>
            @endcan
        @endauth

    </article>
</x-app-layout>
