<x-layouts.blog title="Create Recipe">

<div class="max-w-2xl mx-auto px-4 py-10">

    <h1 class="text-2xl font-bold mb-6">Create a New Recipe</h1>

    @if ($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 p-4 rounded">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST"
          action="{{ route('recipes.store') }}"
          enctype="multipart/form-data"
          class="space-y-6">

        @csrf

        <!-- Title -->
        <div>
            <label class="block font-medium mb-1">Title</label>
            <input type="text"
                   name="title"
                   value="{{ old('title') }}"
                   class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-amber-200"
                   required>
        </div>

        <!-- Excerpt -->
        <div>
            <label class="block font-medium mb-1">
                Short description (max 300 chars)
            </label>
            <textarea name="excerpt"
                      rows="3"
                      maxlength="300"
                      class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-amber-200"
                      required>{{ old('excerpt') }}</textarea>
        </div>

        <!-- Body -->
        <div>
            <label class="block font-medium mb-1">Recipe Instructions</label>
            <textarea name="body"
                      rows="8"
                      class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-amber-200"
                      required>{{ old('body') }}</textarea>
        </div>

        <!-- Image -->
        <div>
            <label class="block font-medium mb-1">Recipe Image (optional)</label>
            <input type="file"
                   name="image"
                   accept="image/*"
                   class="block w-full text-sm text-gray-600">
            <p class="text-xs text-gray-500 mt-1">
                JPG, PNG up to 2MB
            </p>
        </div>

        <!-- Submit -->
        <div class="flex justify-end">
            <button
                class="bg-amber-600 hover:bg-amber-700 text-white px-6 py-2 rounded-lg">
                Publish Recipe
            </button>
        </div>

    </form>

</div>

</x-layouts.blog>
