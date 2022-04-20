<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'language_create',
            ],
            [
                'id'    => 20,
                'title' => 'language_edit',
            ],
            [
                'id'    => 21,
                'title' => 'language_show',
            ],
            [
                'id'    => 22,
                'title' => 'language_delete',
            ],
            [
                'id'    => 23,
                'title' => 'language_access',
            ],
            [
                'id'    => 24,
                'title' => 'client_create',
            ],
            [
                'id'    => 25,
                'title' => 'client_edit',
            ],
            [
                'id'    => 26,
                'title' => 'client_show',
            ],
            [
                'id'    => 27,
                'title' => 'client_delete',
            ],
            [
                'id'    => 28,
                'title' => 'client_access',
            ],
            [
                'id'    => 29,
                'title' => 'order_create',
            ],
            [
                'id'    => 30,
                'title' => 'order_edit',
            ],
            [
                'id'    => 31,
                'title' => 'order_show',
            ],
            [
                'id'    => 32,
                'title' => 'order_delete',
            ],
            [
                'id'    => 33,
                'title' => 'order_access',
            ],
            [
                'id'    => 34,
                'title' => 'notarization_create',
            ],
            [
                'id'    => 35,
                'title' => 'notarization_edit',
            ],
            [
                'id'    => 36,
                'title' => 'notarization_show',
            ],
            [
                'id'    => 37,
                'title' => 'notarization_delete',
            ],
            [
                'id'    => 38,
                'title' => 'notarization_access',
            ],
            [
                'id'    => 39,
                'title' => 'translator_create',
            ],
            [
                'id'    => 40,
                'title' => 'translator_edit',
            ],
            [
                'id'    => 41,
                'title' => 'translator_show',
            ],
            [
                'id'    => 42,
                'title' => 'translator_delete',
            ],
            [
                'id'    => 43,
                'title' => 'translator_access',
            ],
            [
                'id'    => 44,
                'title' => 'primer_create',
            ],
            [
                'id'    => 45,
                'title' => 'primer_edit',
            ],
            [
                'id'    => 46,
                'title' => 'primer_show',
            ],
            [
                'id'    => 47,
                'title' => 'primer_delete',
            ],
            [
                'id'    => 48,
                'title' => 'primer_access',
            ],
            [
                'id'    => 49,
                'title' => 'schet_create',
            ],
            [
                'id'    => 50,
                'title' => 'schet_edit',
            ],
            [
                'id'    => 51,
                'title' => 'schet_show',
            ],
            [
                'id'    => 52,
                'title' => 'schet_delete',
            ],
            [
                'id'    => 53,
                'title' => 'schet_access',
            ],
            [
                'id'    => 54,
                'title' => 'product_create',
            ],
            [
                'id'    => 55,
                'title' => 'product_edit',
            ],
            [
                'id'    => 56,
                'title' => 'product_show',
            ],
            [
                'id'    => 57,
                'title' => 'product_delete',
            ],
            [
                'id'    => 58,
                'title' => 'product_access',
            ],
            [
                'id'    => 59,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
