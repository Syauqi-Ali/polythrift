@component('layouts.app')
@slot('title', 'Daftar Produk Thrift')
@role('Super Admin|seller')
<a href="{{ route('admin.products.index') }}" class="...">Kelola Produk</a>
@endrole

<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-white-800">Daftar Produk Thrift</h2>

        @can('create products')
            <a href="{{ route('admin.products.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-sm transition duration-150">
                + Tambah Produk
            </a>
        @endcan
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white shadow-sm overflow-hidden sm:rounded-xl border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama
                        Produk</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Harga
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Stok
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($products as $product)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <!-- Pastikan memanggil $product->name -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium" style="color: gray">
                            {{ $product->name ?? '-' }}
                        </td>

                        <!-- Kolom Harga -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            Rp {{ number_format($product->price ?? 0, 0, ',', '.') }}
                        </td>

                        <!-- Kolom Stok -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            {{ $product->stock ?? 0 }}
                        </td>

                        <!-- Kolom Aksi -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                            <a href="{{ route('admin.products.edit', $product->id) }}"
                                class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>

                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endcomponent