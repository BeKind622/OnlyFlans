<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Admin Dashboard</h2>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto space-y-12">

        {{-- USERS --}}
        <div>
            <h3 class="text-lg font-semibold mb-4">Users</h3>

            <div class="overflow-x-auto bg-white shadow rounded-lg">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-100 text-left">
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Admin</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr class="border-t">
                                <td class="px-4 py-2">{{ $user->id }}</td>
                                <td class="px-4 py-2">{{ $user->name }}</td>
                                <td class="px-4 py-2">{{ $user->email }}</td>
                                <td class="px-4 py-2">
                                    {{ $user->is_admin ? 'Yes' : 'No' }}
                                </td>
                                <td class="px-4 py-2 flex gap-2">
                                   <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600 hover:underline">
                                                Edit
                                            </a>

                                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}">

                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 hover:underline"
                                                onclick="return confirm('Delete user?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- RECIPES --}}
        <div>
            <h3 class="text-lg font-semibold mb-4">Recipes</h3>

            <div class="overflow-x-auto bg-white shadow rounded-lg">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-100 text-left">
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Author</th>
                            <th class="px-4 py-2">Created</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recipes as $recipe)
                            <tr class="border-t">
                                <td class="px-4 py-2">{{ $recipe->id }}</td>
                                <td class="px-4 py-2">{{ $recipe->title }}</td>
                                <td class="px-4 py-2">
                                    {{ $recipe->user?->name ?? 'Deleted user' }}
                                </td>
                                <td class="px-4 py-2">
                                    {{ $recipe->created_at->format('Y-m-d') }}
                                </td>
                                <td class="px-4 py-2 flex gap-2">
                                    <a href="{{ route('recipes.show', $recipe) }}">View</a>

                                        <a href="{{ route('admin.recipes.edit', $recipe) }}">Edit</a>

                                        <form method="POST" action="{{ route('admin.recipes.destroy', $recipe) }}">

                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 hover:underline"
                                                onclick="return confirm('Delete recipe?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>
