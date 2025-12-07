<x-layouts.blog title="Edit Recipe">
    <form method="POST"
          action="{{ route('recipes.update', $recipe) }}"
          enctype="multipart/form-data"
          class="max-w-2xl mx-auto bg-white p-8 rounded shadow">

        @csrf
        @method('PUT')

        <h1 class="text-2xl font-bold mb-6">Edit Recipe</h1>

        <div class="mb-4">
            <label class="block mb-1">Title</label>
            <input name="title"
                   value="{{ old('title', $recipe->title) }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Excerpt</label>
            <textarea name="excerpt"
                      class="w-full border rounded px-3 py-2">{{ old('excerpt', $recipe->excerpt) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Recipe</label>
            <textarea name="body"
                      rows="6"
                      class="w-full border rounded px-3 py-2">{{ old('body', $recipe->body) }}</textarea>
        </div>

        <div class="mb-6">
            <label class="block mb-1">Replace Image</label>
            <input type="file" name="image">
        </div>

        <button class="bg-blue-600 text-white px-6 py-2 rounded">
            Update
        </button>

    </form>
</x-layouts.blog>
