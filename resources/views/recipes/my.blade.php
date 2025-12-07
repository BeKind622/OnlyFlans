<x-layouts.blog title="My Recipes">

    <h1 class="text-2xl font-bold mb-6">My Recipes</h1>

    @if ($recipes->isEmpty())
        <p class="text-gray-500">
            You haven’t published any recipes yet.
        </p>

        <a href="{{ route('recipes.create') }}"
           class="inline-block mt-4 bg-amber-600 text-white px-4 py-2 rounded">
            Create your first recipe
        </a>
    @else
        <div class="space-y-4">
            @foreach ($recipes as $recipe)
                <div class="bg-white border rounded-lg p-4 flex justify-between items-center">

                    <div>
                        <h2 class="text-lg font-semibold">
                            {{ $recipe->title }}
                        </h2>

                        <p class="text-sm text-gray-600">
                            {{ $recipe->excerpt }}
                        </p>

                        <p class="text-xs text-gray-400 mt-1">
                            Created {{ $recipe->created_at->diffForHumans() }}
                        </p>
                    </div>

                    <div class="flex gap-3">
                        <a href="{{ route('recipes.edit', $recipe) }}"
                           class="text-sm text-blue-600 hover:underline">
                            Edit
                        </a>

                        <form method="POST"
                              action="{{ route('recipes.destroy', $recipe) }}"
                              onsubmit="return confirm('Delete this recipe?')">
                            @csrf
                            @method('DELETE')

                            <button class="text-sm text-red-600 hover:underline">
                                Delete
                            </button>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>
    @endif

</x-layouts.blog>
