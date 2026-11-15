<?php
// app/Http/Controllers/CheckoutController.php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'ongkir' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request) {
            $product = Product::where('id', $request->product_id)->lockForUpdate()->firstOrFail();

            if ($product->status !== 'available') {
                throw new Exception('Produk tidak tersedia');
            }

            $commissionRate = 0.05;
            $platformFee = $product->price * $commissionRate;
            $sellerAmount = $product->price - $platformFee;
            $totalPrice = $product->price + $request->ongkir;

            $order = Order::create([
                'buyer_id' => Auth::id(),
                'store_id' => $product->store_id,
                'price' => $totalPrice,
                'ongkir' => $request->ongkir,
                'commission_rate' => $commissionRate,
                'platform_fee' => $platformFee,
                'seller_amount' => $sellerAmount,
                'status_order' => 'pending',
            ]);

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'item_price' => $product->price,
            ]);

            $product->update(['status' => 'reserved']);

            Payment::create([
                'order_id' => $order->id,
                'status' => 'unpaid',
            ]);
        });

        return response()->json(['message' => 'Pembelian berhasil'], 201);
    }
}