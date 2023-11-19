<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LicenceResource\Pages;
use App\Filament\Resources\LicenceResource\RelationManagers;
use App\Models\Licence;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LicenceResource extends Resource
{
    protected static ?string $model = Licence::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('licence_number')
                    ->required()
                    ->maxLength(255),
                DatePicker::make('valid_to')
                    ->required(),
                TextInput::make('driving_licence_number')
                    ->required()
                    ->maxLength(255),
                DatePicker::make('driving_valid_to')
                    ->required(),
                TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('second_name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('father_name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('birth_place')
                    ->required()
                    ->maxLength(255),
                TextInput::make('birth_date')
                    ->required()
                    ->maxLength(255),
                TextInput::make('residence_place')
                    ->required()
                    ->maxLength(255),
                TextInput::make('first_name_en')
                    ->required()
                    ->maxLength(255),
                TextInput::make('second_name_en')
                    ->required()
                    ->maxLength(255),
                TextInput::make('father_name_en')
                    ->required()
                    ->maxLength(255),
                TextInput::make('birth_place_en')
                    ->required()
                    ->maxLength(255),
                TextInput::make('birth_date_en')
                    ->required()
                    ->maxLength(255),
                TextInput::make('residence_place_en')
                    ->required()
                    ->maxLength(255),
                TextInput::make('phone')
                    ->required()
                    ->tel()
                    ->maxLength(255),
                TextInput::make('email')
                    ->required()
                    ->email()
                    ->maxLength(255),
                TextInput::make('note')
                    ->required()
                    ->maxLength(255),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListLicences::route('/'),
            'create' => Pages\CreateLicence::route('/create'),
            'edit' => Pages\EditLicence::route('/{record}/edit'),
        ];
    }
}
