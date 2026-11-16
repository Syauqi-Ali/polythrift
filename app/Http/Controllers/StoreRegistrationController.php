<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Exception;

class StoreRegistrationController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:stores,name',
            'description' => 'nullable|string',
        ]);

        try {
            DB::transaction(function () use ($request) {
                $user = auth()->user();

                $store = Store::create([
                    'user_id' => $user->id,
                    'name' => $request->name,
                    'slug' => Str::slug($request->name),
                    'description' => $request->description,
                    'status' => 'active',
                    'balance' => 0,
                ]);

                $role = Role::findByName('seller');
                if (!$user->assignRole($role)) {
                    throw new Exception('Gagal menambahkan role "seller"');
                }
            });

            return response()->json(['message' => 'Pendaftaran toko berhasil'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}