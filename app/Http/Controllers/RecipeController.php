<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use Illuminate\Http\Request;


class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::with('user')
        ->latest()
        ->paginate(9);

    return view('recipes.index', compact('recipes'));
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required|max:500',
            'body' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('recipes', 'public');
        }

        auth()->user()->recipes()->create($validated);

        return redirect()->route('recipes.index')
            ->with('success', 'Recipe created!');
    }

    public function show(Recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }

    public function edit(Recipe $recipe)
    {
        abort_if($recipe->user_id !== auth()->id(), 403);

    return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        $this->authorize('update', $recipe);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required|max:500',
            'body' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('recipes', 'public');
        }

        $recipe->update($validated);

        return redirect()->route('recipes.show', $recipe);
    }

    public function destroy(Recipe $recipe)
    {
        abort_if($recipe->user_id !== auth()->id(), 403);

    $recipe->delete();

    return redirect()
        ->route('recipes.mine')
        ->with('success', 'Recipe deleted');
    }
    public function myRecipes()
    {
    $recipes = auth()->user()
        ->recipes()
        ->latest()
        ->get();

    return view('recipes.my', compact('recipes'));
    }

}

