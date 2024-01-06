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
use Filament\Infolists;
use Filament\Infolists\Infolist;

class LicenceResource extends Resource
{
    protected static ?string $model = Licence::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    public static function getNavigationLabel(): string
    {
        return __('filament-panels::pages/licence.licences');
    }
    public static function getModelLabel(): string
    {
        return __('filament-panels::pages/licence.licence');
    }
    public static function getPluralModelLabel(): string
    {
        return __('filament-panels::pages/licence.licences');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')
                    ->label(__('filament-panels::pages/licence.form.first_name')),
                Tables\Columns\TextColumn::make('second_name')
                    ->label(__('filament-panels::pages/licence.form.second_name')),
                Tables\Columns\TextColumn::make('licence_number')
                    ->label(__('filament-panels::pages/licence.form.licence_number')),
                Tables\Columns\TextColumn::make('valid_to')
                    ->label(__('filament-panels::pages/licence.form.valid_to')),
            ])
            ->filters([
                //
            ])
            ->recordClasses(fn(Licence $record) => match ($record->approved) {
                1 => 'bg-green-500/50',
                default => null,
            })
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->hidden(!auth()->user()->hasRole('admin')),
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
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make()
                    ->columns([
                        'default' => 1,
                        'xl' => 4,
                        '2xl' => 6,
                    ])
                    ->schema([
                        Infolists\Components\TextEntry::make('licence_number')
                            ->label(__('filament-panels::pages/licence.form.licence_number')),
                        Infolists\Components\TextEntry::make('valid_to')
                            ->label(__('filament-panels::pages/licence.form.valid_to')),
                        Infolists\Components\TextEntry::make('driving_licence_number')
                            ->label(__('filament-panels::pages/licence.form.driving_licence_number')),
                        Infolists\Components\TextEntry::make('driving_valid_to')
                            ->label(__('filament-panels::pages/licence.form.driving_valid_to')),
                    ]),
                Infolists\Components\Section::make()
                    ->columns([
                        'default' => 1,
                        'xl' => 4,
                        '2xl' => 6,
                    ])
                    ->schema([
                        Infolists\Components\TextEntry::make('first_name')
                            ->label(__('filament-panels::pages/licence.form.first_name')),
                        Infolists\Components\TextEntry::make('second_name')
                            ->label(__('filament-panels::pages/licence.form.second_name')),
                        Infolists\Components\TextEntry::make('father_name')
                            ->label(__('filament-panels::pages/licence.form.father_name')),
                        Infolists\Components\TextEntry::make('birth_place')
                            ->label(__('filament-panels::pages/licence.form.birth_place')),
                        Infolists\Components\TextEntry::make('birth_date')
                            ->label(__('filament-panels::pages/licence.form.birth_date')),
                        Infolists\Components\TextEntry::make('residence_place')
                            ->label(__('filament-panels::pages/licence.form.residence_place')),
                    ]),
                Infolists\Components\Section::make()
                    ->columns([
                        'default' => 1,
                        'xl' => 4,
                        '2xl' => 6,
                    ])
                    ->schema([
                        Infolists\Components\TextEntry::make('phone')
                            ->label(__('filament-panels::pages/licence.form.phone')),
                        Infolists\Components\TextEntry::make('email')
                            ->label(__('filament-panels::pages/licence.form.email')),
                        Infolists\Components\TextEntry::make('note')
                            ->label(__('filament-panels::pages/licence.form.note')),
                    ]),
                Infolists\Components\Section::make()
                    ->columns([
                        'default' => 1,
                        'xl' => 4,
                        '2xl' => 6,
                    ])
                    ->schema([
                        Infolists\Components\TextEntry::make('first_name_en')
                            ->label(__('filament-panels::pages/licence.form.first_name_en')),
                        Infolists\Components\TextEntry::make('second_name_en')
                            ->label(__('filament-panels::pages/licence.form.second_name_en')),
                        Infolists\Components\TextEntry::make('father_name_en')
                            ->label(__('filament-panels::pages/licence.form.father_name_en')),
                        Infolists\Components\TextEntry::make('birth_place_en')
                            ->label(__('filament-panels::pages/licence.form.birth_place_en')),
                        Infolists\Components\TextEntry::make('birth_date_en')
                            ->label(__('filament-panels::pages/licence.form.birth_date_en')),
                        Infolists\Components\TextEntry::make('residence_place_en')
                            ->label(__('filament-panels::pages/licence.form.residence_place_en')),
                    ]),
                Infolists\Components\Section::make()
                    ->columns([
                        'default' => 1,
                        'xl' => 2,
                        '2xl' => 3,
                    ])
                    ->schema([
                        Infolists\Components\ImageEntry::make('personal')
                            ->label(__('filament-panels::pages/licence.form.files.personal')),
                        Infolists\Components\ImageEntry::make('licence_f')
                            ->label(__('filament-panels::pages/licence.form.files.licence_f')),
                        Infolists\Components\ImageEntry::make('licence_b')
                            ->label(__('filament-panels::pages/licence.form.files.licence_b')),
                        Infolists\Components\ImageEntry::make('licence1')
                            ->label(__('filament-panels::pages/licence.form.files.licence1')),
                        Infolists\Components\ImageEntry::make('licence2')
                            ->label(__('filament-panels::pages/licence.form.files.licence2')),
                        Infolists\Components\ImageEntry::make('id_f')
                            ->label(__('filament-panels::pages/licence.form.files.id_f')),
                        Infolists\Components\ImageEntry::make('id_b')
                            ->label(__('filament-panels::pages/licence.form.files.id_b')),
                    ]),
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
            'view' => Pages\ViewLicence::route('/{record}'),
            'edit' => Pages\EditLicence::route('/{record}/edit'),
        ];
    }
}
