<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;
use App\Models\Product;
use App\Models\User;

class StoreSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

    foreach ($users as $user) {
        Store::factory()->create([
                'user_id' => $user->id,
            ]);
        }
    }
}