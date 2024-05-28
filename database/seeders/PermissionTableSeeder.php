<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
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
                'title' =>'audit_logs_access'
            ],
            [
                'id'    => 18,
                'title' =>'audit_logs_show'
            ],
            [
                'id'    => 19,
                'title' =>'audit_logs_delete'
            ],
            [
                'id'    => 20,
                'title' => 'total_balance_create',
            ],
            [
                'id'    => 21,
                'title' => 'total_balance_edit',
            ],
            [
                'id'    => 22,
                'title' => 'total_balance_show',
            ],
            [
                'id'    => 23,
                'title' => 'total_balance_delete',
            ],
            [
                'id'    => 24,
                'title' => 'total_balance_access',
            ],
            [
                'id'    => 25,
                'title' => 'admin_bank_account_create',
            ],
            [
                'id'    => 26,
                'title' => 'admin_bank_account_edit',
            ],
            [
                'id'    => 27,
                'title' => 'admin_bank_account_show',
            ],
            [
                'id'    => 28,
                'title' => 'admin_bank_account_delete',
            ],
            [
                'id'    => 29,
                'title' => 'admin_bank_account_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
