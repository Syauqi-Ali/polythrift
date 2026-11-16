<x-layout>
    <div class="bg-[#EBF3FC] min-h-screen flex items-center justify-center">
        <div class="bg-white rounded-2xl shadow-lg max-w-md w-full p-8">
            <ul class="flex items-center justify-between mb-4">
                <li><a href="{{ route('seller.orders.index', ['status' => 'all']) }}" class="text-gray-900 hover:text-[#1D50A2]">All</a></li>
                <li><a href="{{ route('seller.orders.index', ['status' => 'pending']) }}" class="text-gray-900 hover:text-[#1D50A2]">Pending</a></li>
                <li><a href="{{ route('seller.orders.index', ['status' => 'processing']) }}" class="text-gray-900 hover:text-[#1D50A2]">Processing</a></li>
                <li><a href="{{ route('seller.orders.index', ['status' => 'shipped']) }}" class="text-gray-900 hover:text-[#1D50A2]">Shipped</a></li>
                <li><a href="{{ route('seller.orders.index', ['status' => 'completed']) }}" class="text-gray-900 hover:text-[#1D50A2]">Completed</a></li>
            </ul>
            <table class="w-full">
                <thead>
                    <tr>
                        <th>Kode Order</th>
                        <th>Buyer</th>
                        <th>Alamat Pengiriman</th>
                        <th>Nilai Bersih Penjual</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->order_id }}</td>
                        <td>{{ $order->buyer_name }}</td>
                        <td>{{ $order->shipping_address }}</td>
                        <td>Rp {{ number_format($order->seller_amount, 0, ',', '.') }}</td>
                        <td class="bg-{{ $order->status === 'pending' ? 'amber-100 text-amber-700' : ($order->status === 'completed' ? 'emerald-100 text-emerald-700' : 'rose-100 text-rose-7