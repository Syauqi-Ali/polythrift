<?php

namespace App\Http\Controllers;

use App\Models\Payout;
use App\Models\Store;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PayoutController extends Controller
{
    public function requestPayout(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:10000',
            'bank_name' => 'required|string',
            'account_number' => 'required|string',
            'account_name' => 'required|string',
        ]);

        $store = Auth::user()->store;

        DB::transaction(function () use ($request, $store) {
            $store = Store::where('id', $store->id)->lockForUpdate()->firstOrFail();

            if ($store->balance < $request->amount) {
                throw new Exception('Saldo tidak mencukupi untuk penarikan.');
            }

            $store->decrement('balance', $request->amount);

            Payout::create([
                'store_id' => $store->id,
                'amount' => $request->amount,
                'bank_name' => $request->bank_name,
                'account_number' => $request->account_number,
                'account_name' => $request->account_name,
                'status' => 'pending',
                'requested_at' => now(),
            ]);
        });

        return response()->json(['message' => 'Permintaan penarikan telah diajukan'], 200);
    }

    public function approvePayout($payoutId)
    {
        DB::transaction(function () use ($payoutId) {
            $payout = Payout::where('id', $payoutId)->lockForUpdate()->firstOrFail();
            $store = Store::where('id', $payout->store_id)->lockForUpdate()->firstOrFail();

            $payout->update([
                'status' => 'approved',
                'processed_at' => now(),
            ]);
        });

        return response()->json(['message' => 'Penarikan disetujui'], 200);
    }

    public function rejectPayout(Request $request, $payoutId)
    {
        DB::transaction(function () use ($payoutId) {
            $payout = Payout::where('id', $payoutId)->lockForUpdate()->firstOrFail();
            $store = Store::where('id', $payout->store_id)->lockForUpdate()->firstOrFail();

            $store->increment('balance', $payout->amount);

            $payout->update([
                'status' => 'rejected',
                'processed_at' => now(),
            ]);
        });

        return response()->json(['message' => 'Penarikan ditolak'], 200);
    }
}
