<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdminUser = Role::query()->where('title','super-admin')->first();
        User::query()->create([
           'role_id' => $roleAdminUser->id,
           'name' => 'admin-user',
           'email' => 'admimohammadi@gmail.com',
           'password' => Hash::make(123456),
        ]);
    }
}
