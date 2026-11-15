<?php

// app/Http/Controllers/PaymentController.php
namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function confirmPayment(Request $request, $paymentId)
    {
        $request->validate([
            'proof' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        DB::transaction(function () use ($request, $paymentId) {
            $payment = Payment::where('id', $paymentId)->lockForUpdate()->first();
            $order = Order::where('id', $payment->order_id)->lockForUpdate()->first();
            $user = $order->buyer;
            $store = $order->store;

            // Simpan berkas bukti transfer ke storage
            $path = $request->file('proof')->store('payments/proofs', 'public');
            $payment->update([
                'proof' => $path,
                'status' => 'pending_verification',
                'payment_date' => now(),
            ]);

            $order->update([
                'status_order' => 'waiting_confirmation',
            ]);
        });

        return response()->json(['message' => 'Pembayaran dikonfirmasi'], 200);
    }

    public function verifyPayment(Request $request, $paymentId)
    {
        DB::transaction(function () use ($request, $paymentId) {
            $payment = Payment::where('id', $paymentId)->lockForUpdate()->first();
            $order = Order::where('id', $payment->order_id)->lockForUpdate()->first();
            $store = $order->store;
            $user = Auth::user();

            if ($payment->status != 'pending_verification') {
                throw new Exception('Pembayaran tidak bisa diverifikasi karena statusnya bukan pending verification');
            }

            $payment->update([
                'status' => 'paid',
            ]);

            $order->update([
                'status_order' => 'processing',
            ]);

            // Penambahan Saldo Tenant
            $store->increment('balance', $order->seller_amount);
        });

        return response()->json(['message' => 'Pembayaran diverifikasi'], 200);
    }
}