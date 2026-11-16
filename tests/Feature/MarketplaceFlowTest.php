<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class MarketplaceFlowTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'seller', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'buyer', 'guard_name' => 'web']);
    }

    public function test_user_can_register_store_and_become_seller(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson(route('stores.register'), [
            'name' => 'Toko Thrift Keren',
            'description' => 'Menjual pakaian thrift berkualitas',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('stores', [
            'user_id' => $user->id,
            'name' => 'Toko Thrift Keren',
            'slug' => 'toko-thrift-keren',
        ]);
        $this->assertTrue($user->fresh()->hasRole('seller'));
    }

    public function test_full_checkout_and_payment_verification_flow(): void
    {
        Storage::fake('public');

        $admin = User::factory()->create();
        $admin->assignRole('admin');

        $seller = User::factory()->create();
        $seller->assignRole('seller');
        $store = Store::create([
            'user_id' => $seller->id,
            'name' => 'Polythrift Official',
            'slug' => 'polythrift-official',
            'status' => 'active',
        ]);

        $product = Product::create([
            'store_id' => $store->id,
            'name' => 'Workshirt Kanvas Black',
            'price' => 100000,
            'size' => 'L',
            'condition' => 'Baik',
            'status' => 'available',
        ]);

        $buyer = User::factory()->create();

        $checkoutResponse = $this->actingAs($buyer)->postJson(route('checkout.store'), [
            'product_id' => $product->id,
            'ongkir' => 15000,
        ]);
        $checkoutResponse->assertStatus(201);

        $order = Order::first();
        $payment = Payment::first();

        $this->assertEquals('pending', $order->status_order);
        $this->assertEquals('reserved', $product->fresh()->status);

        $confirmResponse = $this->actingAs($buyer)->postJson(route('payments.confirm', $payment->id), [
            // 'proof' => UploadedFile::fake()->image('bukti-transfer.jpg'),
            'proof' => UploadedFile::fake()->create('bukti-transfer.jpg', 100, 'image/jpeg'),
        ]);
        // $confirmResponse->dump();
        $confirmResponse->assertStatus(200);

        $this->assertEquals('pending_verification', $payment->fresh()->status);

        $verifyResponse = $this->actingAs($admin)->postJson(route('admin.payments.verify', $payment->id));
        $verifyResponse->assertStatus(200);

        $this->assertEquals('paid', $payment->fresh()->status);
        $this->assertEquals('processing', $order->fresh()->status_order);
        $this->assertEquals(95000, $store->fresh()->balance);
    }
}
