<x-layout>
    <div class="bg-[#EBF3FC] min-h-screen flex items-center justify-center">
        <div class="bg-white rounded-2xl shadow-lg max-w-md w-full p-8">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-gray-900 text-3xl">Manajemen Inventaris Stok</h1>
                <a href="{{ route('seller.products.create') }}" class="bg-[#1D50A2] hover:bg-blue-800 text-white font-semibold py-2 px-4 rounded-full">+ Tambah Produk</a>
            </div>
            <div class="flex items-center mb-4">
                <input type="text" class="border border-gray-300 rounded-l-lg p-3" placeholder="Search">
                <select class="border border-gray-300 rounded-r-lg p-3">
                    <option value="all">All</option>
                    <option value="category">Category</option>
                    <option value="condition">Condition</option>
                    <option value="status">Status</option>
                </select>
            </div>
            <table class="w-full">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama Produk</th>
                        <th>Size</th>
                        <th>Condition</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td><img src="{{ asset('images/placeholder.jpg') }}" class="w-20 h-20 object-cover" alt="{{ $product->name }}"></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->size }}</td>
                        <td>{{ $product->condition }}</td>
                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="bg-{{ $product->status === 'available' ? 'emerald-100 text-emerald-700' : ($product->status === 'reserved' ? 'amber-100 text-amber-700' : 'rose-100 text-rose-700') }}">{{ $product->status }}</td>
                        <td>
                            <a href="{{ route('seller.products.edit', $product->id) }}" class="bg-[#1D50A2] hover:bg-blue-800 text-white font-semibold py-1 px-2 rounded-full">Edit</a>
                            <form action="{{ route('seller.products.destroy', $product->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-1 px-2 rounded-full">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>