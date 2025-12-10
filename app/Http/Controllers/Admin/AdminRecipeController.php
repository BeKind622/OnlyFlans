<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recipe;

class AdminRecipeController extends Controller
{
    public function index()
    {
        return view('admin.recipes.index', [
            'recipes' => Recipe::with('user')->latest()->paginate(10),
        ]);
    }

    public function edit(Recipe $recipe)
    {
        return view('recipes.edit', compact('recipe'));
    }

    public function update(Recipe $recipe)
    {
        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
        ]);

        $recipe->update(request()->only('title', 'excerpt', 'body'));

        return redirect()->route('recipes.index');
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return back();
    }
}