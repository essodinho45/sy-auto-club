<?php

namespace App\Filament\Resources\LicenceResource\Pages;

use App\Filament\Resources\LicenceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\EditRecord\Concerns\HasWizard;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Components\FileUpload;

class EditLicence extends EditRecord {
    use HasWizard;
    protected static string $resource = LicenceResource::class;

    protected function getHeaderActions(): array {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getSteps(): array {
        return [
            Step::make('General')->columns([
                'default' => 1,
                'xl' => 2,
                '2xl' => 4,
            ])->schema([
                        TextInput::make('licence_number')
                            ->required()
                            ->label(__('filament-panels::pages/licence.form.licence_number'))
                            ->maxLength(255),
                        DatePicker::make('valid_to')
                            ->label(__('filament-panels::pages/licence.form.valid_to'))
                            ->required(),
                        TextInput::make('driving_licence_number')
                            ->label(__('filament-panels::pages/licence.form.driving_licence_number'))
                            ->required()
                            ->maxLength(255),
                        DatePicker::make('driving_valid_to')
                            ->label(__('filament-panels::pages/licence.form.driving_valid_to'))
                            ->required(),
                        TextInput::make('first_name')
                            ->label(__('filament-panels::pages/licence.form.first_name'))
                            ->required()
                            ->maxLength(255),
                        TextInput::make('second_name')
                            ->label(__('filament-panels::pages/licence.form.second_name'))
                            ->required()
                            ->maxLength(255),
                        TextInput::make('father_name')
                            ->label(__('filament-panels::pages/licence.form.father_name'))
                            ->required()
                            ->maxLength(255),
                        TextInput::make('birth_place')
                            ->label(__('filament-panels::pages/licence.form.birth_place'))
                            ->required()
                            ->maxLength(255),
                        DatePicker::make('birth_date')
                            ->label(__('filament-panels::pages/licence.form.birth_date'))
                            ->required(),
                        TextInput::make('residence_place')
                            ->label(__('filament-panels::pages/licence.form.residence_place'))
                            ->required()
                            ->maxLength(255),
                    ]),
            Step::make('English')->columns([
                'default' => 1,
                'xl' => 2,
                '2xl' => 4,
            ])->schema([TextInput::make('first_name_en')
                            ->label(__('filament-panels::pages/licence.form.first_name_en'))
                            ->required()
                            ->maxLength(255),
                        TextInput::make('second_name_en')
                            ->label(__('filament-panels::pages/licence.form.second_name_en'))
                            ->required()
                            ->maxLength(255),
                        TextInput::make('father_name_en')
                            ->label(__('filament-panels::pages/licence.form.father_name_en'))
                            ->required()
                            ->maxLength(255),
                        TextInput::make('birth_place_en')
                            ->label(__('filament-panels::pages/licence.form.birth_place_en'))
                            ->required()
                            ->maxLength(255),
                        DatePicker::make('birth_date_en')
                            ->label(__('filament-panels::pages/licence.form.birth_date_en'))
                            ->required(),
                        TextInput::make('residence_place_en')
                            ->label(__('filament-panels::pages/licence.form.residence_place_en'))
                            ->required()
                            ->maxLength(255),
                    ]),
            Step::make('Contact')->columns([
                'default' => 1,
                'xl' => 2,
                '2xl' => 4,
            ])->schema([TextInput::make('phone')
                            ->label(__('filament-panels::pages/licence.form.phone'))
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->label(__('filament-panels::pages/licence.form.email'))
                            ->required()
                            ->email()
                            ->maxLength(255),
                        TextInput::make('note')
                            ->label(__('filament-panels::pages/licence.form.note'))
                            ->required()
                            ->columnSpan(2)
                            ->maxLength(255),
                    ]),
            Step::make('Files')->columns([
                'default' => 1,
                'xl' => 3,
                '2xl' => 4,
            ])->schema([
                        FileUpload::make('personal')
                            ->label(__('filament-panels::pages/licence.form.files.personal'))
                            ->image()
                            ->required(false),
                        FileUpload::make('licence_f')
                            ->label(__('filament-panels::pages/licence.form.files.licence_f'))
                            ->image()
                            ->required(false),
                        FileUpload::make('licence_b')
                            ->label(__('filament-panels::pages/licence.form.files.licence_b'))
                            ->image()
                            ->required(false),
                        FileUpload::make('licence1')
                            ->label(__('filament-panels::pages/licence.form.files.licence1'))
                            ->image()
                            ->required(false),
                        FileUpload::make('licence2')
                            ->label(__('filament-panels::pages/licence.form.files.licence2'))
                            ->image()
                            ->required(false),
                        FileUpload::make('id_f')
                            ->label(__('filament-panels::pages/licence.form.files.id_f'))
                            ->image()
                            ->required(false),
                        FileUpload::make('id_b')
                            ->label(__('filament-panels::pages/licence.form.files.id_b'))
                            ->image()
                            ->required(false),
                    ]),
        ];
    }
    protected function mutateFormDataBeforeSave(array $data): array {
        return $data;
    }
}
