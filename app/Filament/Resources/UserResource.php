<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    public static function getNavigationLabel(): string {
        return __('filament-panels::pages/user.users');
    }
    public static function getModelLabel(): string {
        return __('filament-panels::pages/user.user');
    }
    public static function getPluralModelLabel(): string {
        return __('filament-panels::pages/user.users');
    }
    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label(__('filament-panels::pages/user.form.name'))
                ->required(),
                Forms\Components\TextInput::make('email')
                    ->label(__('filament-panels::pages/user.form.email'))
                ->required()
                ->email(),
                Forms\Components\TextInput::make('password')
                ->label(__('filament-panels::pages/user.form.password'))
                ->required()->rules(['min:8', 'confirmed'])
                ->password(),
                Forms\Components\TextInput::make('password_confirmation')
                ->label(__('filament-panels::pages/user.form.password_confirm'))
                ->required()
                ->password(),
                Forms\Components\Select::make('roles.name')
                ->label(__('filament-panels::pages/user.form.role'))
                ->options([
                    'admin' => __('filament-panels::pages/user.roles.admin'),
                    'data-entry' => __('filament-panels::pages/user.roles.data')
                ])
                ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament-panels::pages/user.form.name')),
                Tables\Columns\TextColumn::make('email')
                    ->label(__('filament-panels::pages/user.form.email')),
                Tables\Columns\TextColumn::make('roles.name')
                    ->label(__('filament-panels::pages/user.form.role')),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->disabled(fn (Model $record): bool => $record->id == 1),
            ])
            ->bulkActions([
//                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DeleteBulkAction::make(),
//                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
