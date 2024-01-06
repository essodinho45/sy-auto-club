<?php

namespace Database\Seeders;

use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Filament\Commands\MakeUserCommand;
use Illuminate\Support\Facades\Hash;

class AdminPanelUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filamentMakeUserCommand = new MakeUserCommand();
        $reflector = new \ReflectionObject($filamentMakeUserCommand);

        $getUserModel = $reflector->getMethod('getUserModel');
        $getUserModel->setAccessible(true);
        $getUserModel->invoke($filamentMakeUserCommand)::create([
            'name' => 'admin',
            'email' => 'admin@sacidl.com',
            'password' => Hash::make('P@ssw0rd'),
        ]);
    }
}
