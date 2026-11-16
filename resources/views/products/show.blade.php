<x-layout>
    <div class="bg-[#EBF3FC] min-h-screen flex items-center justify-center">
        <div class="bg-white rounded-2xl shadow-lg max-w-md w-full p-8">
            <nav aria-label="breadcrumb">
                <ol class="flex items-center space-x-4">
                    <li><a href="{{ route('products.index') }}" class="text-gray-600">Produk</a></li>
                    <li><span class="text-gray-900">{{ $product->name }}</span></li>
                </ol>
            </nav>
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <img src="{{ asset('images/placeholder.jpg') }}" class="w-full h-80 object-cover" alt="{{ $product->name }}">
                    <div class="grid grid-cols-4 gap-4 mt-4">
                        <img src="{{ asset('images/placeholder.jpg') }}" class="w-full h-20 object-cover" alt="{{ $product->name }}">
                        <img src="{{ asset('images/placeholder.jpg') }}" class="w-full h-20 object-cover" alt="{{ $product->name }}">
                        <img src="{{ asset('images/placeholder.jpg') }}" class="w-full h-20 object-cover" alt="{{ $product->name }}">
                        <img src="{{ asset('images/placeholder.jpg') }}" class="w-full h-20 object-cover" alt="{{ $product->name }}">
                    </div>
                </div>
                <div>
                    <h1 class="text-gray-900 text-3xl mb-4">{{ $product->name }}</h1>
                    <p class="text-[#1D50A2] font-bold text-3xl mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="bg-emerald-100 text-emerald-700 px-2 rounded-full">{{ $product->size }}</span>
                        <span class="bg-emerald-100 text-emerald-700 px-2 rounded-full">{{ $product->condition }}</span>
                    </div>
                    <p class="text-gray-900 mb-4">Toko Penjual: {{ $product->store->name }}</p>
                    <form action="{{ route('checkout.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="bg-[#1D50A2] hover:bg-blue-800 text-white font-semibold py-3 rounded-full w-full shadow-md">Beli Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>