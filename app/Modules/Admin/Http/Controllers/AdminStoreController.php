<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
class AdminStoreController extends Controller
{
    public function edit(string $id)
    {
        /** @var \App\Models\User $userAuth */
        $userAuth = request()->user();
        
        if ($id != $userAuth->store_id) {
            abort(403, 'FORBIDDEN');
        }

        $store = Store::where('id', $id)->firstOrFail();
        return view('admin.stores.edit', compact('store'));
    }

    public function update(Request $request, string $id)
    {
        /** @var \App\Models\User $userAuth */
        $userAuth = request()->user();

        if ($id != $userAuth->store_id) {
            abort(403, 'FORBIDDEN');
        }

        $store = Store::where('id', $id)->firstOrFail();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable'|'string',
            'phone' => 'nullable|string|max:20',
        ]);
        $store->update($validatedData);

        return redirect()->route('admin.store.index')
        ->with('success, profile change');
    } 

    public function destroy(string $id)
    {
        abort(403, 'FORBIDDEN');
    }
}
