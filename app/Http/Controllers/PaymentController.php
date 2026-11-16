<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Exception;

class PaymentController extends Controller
{
    public function confirmPayment(Request $request, $paymentId)
    {
        $request->validate([
            'proof' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
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
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function verifyPayment(Request $request, $paymentId)
    {
        try {
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

            return response()->json(['message' => 'Penarikan disetujui'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function rejectPayout(Request $request, $payoutId)
    {
        try {
            DB::transaction(function () use ($request, $payoutId) {
                $payout = Payout::where('id', $payoutId)->lockForUpdate()->first();
                $store = Store::where('id', $payout->store_id)->lockForUpdate()->first();

                $store->increment('balance', $payout->amount);

                $payout->update([
                    'status' => 'rejected',
                    'processed_at' => now(),
                ]);
            });

            return response()->json(['message' => 'Penarikan ditolak'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}