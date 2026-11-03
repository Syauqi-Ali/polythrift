<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AdminUserController extends Controller
{
    public function edit(string $id)
    {
        $userAuth = request()->user();
        $user = User::where('id', $id)
                    ->where('store_id', $userAuth->store_id)
                    ->firstOrFail();
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        /** @var \App\Models\User $userAuth */
        $userAuth = request()->user();

        $user = User::where('id', $id)
        ->where('store_id', $userAuth->store_id)
        ->firstOrFail();

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->$id,
        ];

        if ($request->filled('password')) {
            $rules['password'] = 'required|string|min:8|confirmed';
        }

        $validatedData = $request->validate($rules);

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(string $id)
    {
        /** @var \App\Models\User $userAuth */
        $userAuth = request()->user();

        $user = User::where('id', $id)
        ->where('store_id', $userAuth->store_id)
        ->firstOrFail();

        if ($user->id === $userAuth->id) {
            return redirect()->route('admin.users.index')->with('error', 'You cannot delete your own account.');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
