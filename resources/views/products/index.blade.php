<x-layout>
    <div class="bg-[#EBF3FC] min-h-screen flex items-center justify-center">
        <div class="bg-white rounded-2xl shadow-lg max-w-md w-full p-8">
            <div class="text-center mb-6">
                <h1 class="text-[#1D50A2] font-bold text-3xl">Not Your Ordinary Thrift Store</h1>
                <button class="bg-gray-800 hover:bg-gray-700 text-white font-semibold py-3 rounded-full w-full mt-4">SHOP NOW</button>
            </div>
            <div class="grid grid-cols-3 gap-6">
                @foreach($products as $product)
                <div class="bg-[#DDEBFA] rounded-lg overflow-hidden">
                    <img src="{{ asset('images/placeholder.jpg') }}" class="w-full h-48 object-cover" alt="{{ $product->name }}">
                    <div class="p-4">
                        <h2 class="text-gray-900 text-xl">{{ $product->name }}</h2>
                        <p class="text-[#1D50A2] font-bold text-3xl">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <div class="flex space-x-2">
                            <span class="bg-emerald-100 text-emerald-700 px-2 rounded-full">{{ $product->size }}</span>
                            <span class="bg-emerald-100 text-emerald-700 px-2 rounded-full">{{ $product->condition }}</span>
                        </div>
                        <a href="{{ route('products.show', $product->slug) }}" class="block mt-4 bg-[#1D50A2] hover:bg-blue-800 text-white font-semibold py-3 rounded-full w-full">Detail</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-6">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-layout>