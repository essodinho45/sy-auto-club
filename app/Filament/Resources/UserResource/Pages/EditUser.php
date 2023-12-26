<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $user, array $data): Model
    {
        $role_data = $data['roles']['name'];
        unset($data['password_confirmation']);
        unset($data['roles']);
        $data['password'] = Hash::make($data['password']);
        $user->update($data);
        $user->syncRoles([$role_data]);
        return $user;
    }
}
