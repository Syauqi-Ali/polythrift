<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $storeRole = Role::firstOrCreate(['name' => 'store']);
        $customerRole = Role::firstOrCreate(['name' => 'customer']);

        $admin = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com'
        ])->assignRole($adminRole);

        $store = User::factory()->create([
            'name' => 'Store',
            'email' => 'store@gmail.com'
        ])->assignRole($storeRole);

        $customer = User::factory()->create([
            'name' => 'Customer',
            'email' => 'customer@gmail.com'
        ])->assignRole($customerRole);

        User::factory(9)->create()->each(function ($user) use ($customerRole) {
            $user->assignRole($customerRole);
        });
    }
}
