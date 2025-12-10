<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::latest()->paginate(10),
        ]);
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(User $user)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'is_admin' => 'boolean',
        ]);

        $user->update(request()->only('name', 'email', 'is_admin'));

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}