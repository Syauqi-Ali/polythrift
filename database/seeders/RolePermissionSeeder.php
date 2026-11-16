<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'browse-products',
            'checkout-order',
            'upload-payment-proof',
            'register-store',
            'manage-products',
            'view-store-balance',
            'request-payout',
            'verify-payment',
            'manage-payouts',
            'manage-users',
            'manage-stores',
        ];

        $adminPermissions = [
            'verify-payment',
            'manage-payouts',
            'manage-users',
            'manage-stores',
        ];

        $sellerPermissions = [
            'manage-products',
            'view-store-balance',
            'request-payout',
            'browse-products',
            'checkout-order',
            'upload-payment-proof',
        ];

        $buyerPermissions = [
            'browse-products',
            'checkout-order',
            'upload-payment-proof',
            'register-store',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $adminRole->syncPermissions($adminPermissions);

        $sellerRole = Role::firstOrCreate(['name' => 'seller', 'guard_name' => 'web']);
        $sellerRole->syncPermissions($sellerPermissions);

        $buyerRole = Role::firstOrCreate(['name' => 'buyer', 'guard_name' => 'web']);
        $buyerRole->syncPermissions($buyerPermissions);

        $adminUser = User::firstOrCreate(['email' => 'admin@polythrift.test'], [
            'name' => 'Admin',
            'password' => bcrypt('password'),
        ]);
        $adminUser->assignRole('admin');

        $buyerUser = User::firstOrCreate(['email' => 'buyer@polythrift.test'], [
            'name' => 'Buyer',
            'password' => bcrypt('password'),
        ]);
        $buyerUser->assignRole('buyer');
    }
}