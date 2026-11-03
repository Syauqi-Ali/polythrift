<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class AdminProductController extends Controller
{
public function index()
{
    /** @var \App\Models\User $user */
    $user = Auth::user();

    if ($user->hasRole('Super Admin')) {
        $products = Product::latest()->get();
    } else {
        $store = \App\Models\Store::where('user_id', $user->id)->first();

        $products = $store 
            ? Product::where('store_id', $store->id)->latest()->get() 
            : collect();
    }

    return view('admin.products.index', compact('products'));
}
    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'size' => 'required|string|max:50',
        'condition' => 'required|string|max:100',
        'price' => 'required|numeric',
        'status' => 'required|string|max:50',
    ]);

    $validated['store_id'] = $request->user()->store_id;

    Product::create($validated);

    return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
}

    public function edit(Request $request, Product $product)
    {
        if ($product->store_id !== $request->user()->store_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
{
    if ($product->store_id !== $request->user()->store_id) {
        abort(403);
    }

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'size' => 'required|string|max:50',
        'condition' => 'required|string|max:100',
        'price' => 'required|numeric',
        'status' => 'required|string|max:50',
    ]);

    $product->update($validated);

    return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
}

    public function destroy(Request $request, Product $product)
    {
        if ($product->store_id !== $request->user()->store_id) {
            abort(403);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
