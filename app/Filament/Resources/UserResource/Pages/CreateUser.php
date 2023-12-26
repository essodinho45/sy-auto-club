<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
    protected function handleRecordCreation(array $data): \Illuminate\Database\Eloquent\Model
    {
        $role_data = $data['roles']['name'];
        unset($data['password_confirmation']);
        unset($data['roles']);
        $data['password'] = Hash::make($data['password']);
        $user = static::getModel()::create($data);
        $user->assignRole($role_data);
        return $user;
    }
}
