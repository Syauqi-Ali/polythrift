<x-layout>
    <div class="bg-[#EBF3FC] min-h-screen flex">
        <aside class="bg-[#1D50A2] text-white w-64 p-4">
            <img src="path/to/logo.png" class="h-10 mb-4">
            <ul>
                <li class="mb-2"><a href="{{ route('seller.dashboard') }}" class="text-white hover:text-gray-200">Dashboard</a></li>
                <li class="mb-2"><a href="{{ route('seller.products.index') }}" class="text-white hover:text-gray-200">Produk</a></li>
                <li class="mb-2"><a href="{{ route('seller.orders.index') }}" class="text-white hover:text-gray-200">Pesanan</a></li>
                <li class="mb-2"><a href="{{ route('seller.payouts.index') }}" class="text-white hover:text-gray-200">Payouts</a></li>
                <li class="mb-2"><a href="{{ route('seller.settings.index') }}" class="text-white hover:text-gray-200">Settings</a></li>
            </ul>
        </aside>
        <main class="bg-white p-6 flex-1">
            <div class="bg-[#1D50A2] text-white rounded-2xl shadow-md p-6 mb-4">
                <h2 class="text-white">Total Produk: {{ $totalProducts }}</h2>
                <h2 class="text-white">Total Pesanan: {{ $totalOrders }}</h2>
                <h2 class="text-white">Pesanan Diproses: {{ $pendingOrders }}</h2>
                <h2 class="text-white">Total Saldo / Pendapatan: Rp {{ number_format($store->balance ?? 0, 0, ',', '.') }}</h2>
            </div>
            <div class="grid grid-cols-3 gap-6">
                <canvas id="lineChart"></canvas>
                <canvas id="donutChart"></canvas>
            </div>
            <div class="mt-6">
                <h2 class="text-gray-900">Kategori Produk</h2>
                <canvas id="categoryChart"></canvas>
            </div>
            <div class="mt-6">
                <h2 class="text-gray-900">Pesanan Terbaru</h2>
                <table class="w-full">
                    <thead>
                        <tr>
                            <th>Kode Order</th>
                            <th>Buyer</th>
                            <th>Alamat Pengiriman</th>
                            <th>Rincian Komisi Platform</th>
                            <th>Nilai Bersih Penjual</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentOrders as $order)
                        <tr>
                            <td>{{ $order->order_id }}</td>
                            <td>{{ $order->buyer_name }}</td>
                            <td>{{ $order->shipping_address }}</td>
                            <td>Rp {{ number_format($order->platform_fee, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($order->seller_amount, 0, ',', '.') }}</td>
                            <td class="bg-{{ $order->status === 'pending' ? 'amber-100 text-amber-700' : ($order->status === 'completed' ? 'emerald-100 text-emerald-700' : 'rose-100 text-rose-700') }}">{{ $order->status }}</td>
                            <td>
                                <form action="{{ route('seller.orders.update', $order->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-[#1D50A2] hover:bg-blue-800 text-white font-semibold py-1 px-2 rounded-full">Update Status</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</x-layout>