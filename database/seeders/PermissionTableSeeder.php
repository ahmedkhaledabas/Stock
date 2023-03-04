<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'users',
            'user_list',
            'user_create',
            'user_delete',
            'user_edit',
            'user_permission',

            'role_list',
            'role_edit',
            'role_delete',
            'role_create',

            'products',
            'product_list',
            'product_list_user',
            'product_create',
            'product_edit',
            'product_delete',

            'category',
            'category_list',
            'category_create',
            'category_edit',
            'category_delete',

            'subCategory',
            'subCategory_list',
            'subCategory_create',
            'subCategory_edit',
            'subCategory_delete',


        ];

    foreach ($permissions as $permission) {

        Permission::create(['name' => $permission]);
            }
    }
}
