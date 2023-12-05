<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LicenceResource\Pages;
use App\Filament\Resources\LicenceResource\RelationManagers;
use App\Models\Licence;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LicenceResource extends Resource {
    protected static ?string $model = Licence::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationLabel(): string {
        return __('filament-panels::pages/licence.licence');
    }
    public static function getModelLabel(): string {
        return __('filament-panels::pages/licence.licence');
    }
    public static function getPluralModelLabel(): string {
        return __('filament-panels::pages/licence.licences');
    }

    public static function table(Table $table): Table {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('licence_number')
                    ->label(__('filament-panels::pages/licence.form.licence_number')),
                Tables\Columns\TextColumn::make('valid_to')
                    ->label(__('filament-panels::pages/licence.form.valid_to')),
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

    public static function getRelations(): array {
        return [
            //
        ];
    }

    public static function getPages(): array {
        return [
            'index' => Pages\ListLicences::route('/'),
            'create' => Pages\CreateLicence::route('/create'),
            'edit' => Pages\EditLicence::route('/{record}/edit'),
        ];
    }
}
