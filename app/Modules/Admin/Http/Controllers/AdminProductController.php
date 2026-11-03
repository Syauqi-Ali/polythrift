<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class AdminProductController extends Controller
{
    public function edit($id)
    {
        /** @var \App\Models\User $user */
        $user = request()->user();
        $product = Product::where('id', $id)
                        ->where('store_id', $user->store_id)
                        ->firstOrFail();

        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0,',
        ]);

        /** @var \App\Models\User $user */
        $user = request()->user();
        $product = Product::where('id', $id)
                        ->where('store_id', $user->store_id)
                        ->firstOrFail();

        $product->update($validatedData);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        /** @var \App\Models\User $user */
        $user = request()->user();
        $product = Product::where('id', $id)
                        ->where('store_id', $user->store_id)
                        ->firstOrFail();

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
