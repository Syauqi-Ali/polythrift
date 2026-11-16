<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function confirmPayment(Request $request, $paymentId)
    {
        $request->validate([
            'proof' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            DB::transaction(function () use ($request, $paymentId) {
                $payment = Payment::where('id', $paymentId)->lockForUpdate()->firstOrFail();
                $order = Order::where('id', $payment->order_id)->lockForUpdate()->firstOrFail();

                if ($order->buyer_id !== Auth::id()) {
                    throw new Exception('Anda tidak berhak mengonfirmasi pembayaran ini.');
                }

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
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function verifyPayment(Request $request, $paymentId)
    {
        try {
            DB::transaction(function () use ($paymentId) {
                $payment = Payment::where('id', $paymentId)->lockForUpdate()->firstOrFail();
                $order = Order::where('id', $payment->order_id)->lockForUpdate()->firstOrFail();
                $store = $order->store;

                if ($payment->status !== 'pending_verification') {
                    throw new Exception('Pembayaran tidak bisa diverifikasi karena statusnya bukan pending verification');
                }

                $payment->update([
                    'status' => 'paid',
                ]);

                $order->update([
                    'status_order' => 'processing',
                ]);

                $store->increment('balance', $order->seller_amount);
            });

            return response()->json(['message' => 'Pembayaran berhasil diverifikasi'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
