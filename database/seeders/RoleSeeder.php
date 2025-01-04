<?php

namespace Database\Seeders;

use App\Enums\PermissionsEnum;
use App\Enums\RolesEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userRole = Role::create(['name' => RolesEnum::User->value]);
        $vendorRole = Role::create(['name' => RolesEnum::Vendor->value]);
        $adminRole = Role::create(['name' => RolesEnum::Admin->value]);

        $approveVendors = Permission::create(["name" => PermissionsEnum::ApproveVendor->value]);
        $sellProducts = Permission::create(["name" => PermissionsEnum::SellProduct->value]);
        $buyProducts = Permission::create(["name" => PermissionsEnum::BuyProduct->value]);

        $userRole->syncPermissions([
            $buyProducts
        ]);
        $vendorRole->syncPermissions([
            $sellProducts,$buyProducts
            ]
        );
        $adminRole->syncPermissions([
            $approveVendors,$sellProducts,$buyProducts
        ]);
    }
}
