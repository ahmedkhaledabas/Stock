<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    
         $user = User::create([
        'name' => 'Ahmed Khaled', 
        'email' => 'ahmedkhaled@yahoo.com',
        'password' => bcrypt('123456'),
        'phone' => '01112131415',
        'verification_code' =>'878a',
        'roles_name' => ["owner"] ,
       
        ]);
  
        $role = Role::create(['name' => 'owner']);
   
        $permissions = Permission::pluck('id','id')->all();
  
        $role->syncPermissions($permissions);
   
        $user->assignRole([$role->id]);


}
}