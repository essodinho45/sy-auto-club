<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::firstOrCreate(['name'=>'admin']);
        Role::firstOrCreate(['name'=>'data-entry']);
        $user = User::where(['name'=>'admin'])->first();
        if($user)
            $user->assignRole('admin');
    }
}
