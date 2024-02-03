<?php

namespace App\Filament\Resources\LicenceResource\Pages;

use App\Filament\Resources\LicenceResource;
use App\Rules\AlphaWithSpaces;
use Filament\Actions;
use Filament\Forms\Set;
use Filament\Forms\Components\Select;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Components\FileUpload;


class CreateLicence extends CreateRecord
{
    use CreateRecord\Concerns\HasWizard;
    protected static string $resource = LicenceResource::class;
    protected function getSteps(): array
    {
        return [
            Step::make(__('filament-panels::pages/licence.wizard.general'))->columns([
                'default' => 1,
                'xl' => 2,
                '2xl' => 4,
            ])->schema([
                        // TextInput::make('licence_number')
                        //     ->required()
                        //     ->label(__('filament-panels::pages/licence.form.licence_number'))
                        //     ->maxLength(255),
                        // DatePicker::make('valid_to')
                        //     ->label(__('filament-panels::pages/licence.form.valid_to'))
                        //     ->required(),
                        TextInput::make('driving_licence_number')
                            ->label(__('filament-panels::pages/licence.form.driving_licence_number'))
                            ->required()
                            ->alphaNum()
                            ->helperText('يرجى استخدام أحرف وأرقام فقط بدون رموز إضافية.')
                            ->maxLength(255),
                        DatePicker::make('driving_valid_to')
                            ->label(__('filament-panels::pages/licence.form.driving_valid_to'))
                            ->required(),
                        TextInput::make('first_name')
                            ->label(__('filament-panels::pages/licence.form.first_name'))
                            ->required()
                            ->rules([new AlphaWithSpaces()])
                            ->helperText('يرجى استخدام أحرف عربية فقط بدون أرقام أو رموز إضافية.')
                            ->maxLength(255),
                        TextInput::make('second_name')
                            ->label(__('filament-panels::pages/licence.form.second_name'))
                            ->required()
                            ->rules([new AlphaWithSpaces()])
                            ->helperText('يرجى استخدام أحرف عربية فقط بدون أرقام أو رموز إضافية.')
                            ->maxLength(255),
                        TextInput::make('father_name')
                            ->label(__('filament-panels::pages/licence.form.father_name'))
                            ->required()
                            ->rules([new AlphaWithSpaces()])
                            ->helperText('يرجى استخدام أحرف عربية فقط بدون أرقام أو رموز إضافية.')
                            ->maxLength(255),
                        TextInput::make('birth_place')
                            ->label(__('filament-panels::pages/licence.form.birth_place'))
                            ->placeholder('دمشق')
                            ->rules([new AlphaWithSpaces()])
                            ->helperText('يرجى استخدام أحرف عربية فقط بدون أرقام أو رموز إضافية.')
                            ->required()
                            ->maxLength(255),
                        Select::make('birth_date')
                            ->label(__('filament-panels::pages/licence.form.birth_date'))
                            ->options(
                                array_combine(
                                    range(date("Y"), config('settings.start_year')),
                                    range(date("Y"), config('settings.start_year'))
                                )
                            )
                            ->live()
                            ->afterStateUpdated(fn(Set $set, ?int $state) => $set('birth_date_en', $state))
                            ->searchable()
                            ->required(),
                        TextInput::make('residence_place')
                            ->label(__('filament-panels::pages/licence.form.residence_place'))
                            ->placeholder('دمشق')
                            ->required()
                            ->rules([new AlphaWithSpaces()])
                            ->helperText('يرجى استخدام أحرف عربية فقط بدون أرقام أو رموز إضافية.')
                            ->maxLength(255),
                    ]),
            Step::make(__('filament-panels::pages/licence.wizard.english'))->columns([
                'default' => 1,
                'xl' => 2,
                '2xl' => 4,
            ])->schema([
                        TextInput::make('first_name_en')
                            ->label(__('filament-panels::pages/licence.form.first_name_en'))
                            ->required()
                            ->rules([new AlphaWithSpaces()])
                            ->helperText('يرجى استخدام أحرف انكليزية فقط بدون أرقام أو رموز إضافية.')
                            ->maxLength(255),
                        TextInput::make('second_name_en')
                            ->label(__('filament-panels::pages/licence.form.second_name_en'))
                            ->required()
                            ->rules([new AlphaWithSpaces()])
                            ->helperText('يرجى استخدام أحرف انكليزية فقط بدون أرقام أو رموز إضافية.')
                            ->maxLength(255),
                        TextInput::make('father_name_en')
                            ->label(__('filament-panels::pages/licence.form.father_name_en'))
                            ->required()
                            ->rules([new AlphaWithSpaces()])
                            ->helperText('يرجى استخدام أحرف انكليزية فقط بدون أرقام أو رموز إضافية.')
                            ->maxLength(255),
                        TextInput::make('birth_place_en')
                            ->label(__('filament-panels::pages/licence.form.birth_place_en'))
                            ->required()
                            ->rules([new AlphaWithSpaces()])
                            ->helperText('يرجى استخدام أحرف انكليزية فقط بدون أرقام أو رموز إضافية.')
                            ->placeholder('Damascus')
                            ->maxLength(255),
                        Select::make('birth_date_en')
                            ->label(__('filament-panels::pages/licence.form.birth_date_en'))
                            ->options(
                                array_combine(
                                    range(date("Y"), config('settings.start_year')),
                                    range(date("Y"), config('settings.start_year'))
                                )
                            )
                            ->searchable()
                            ->required(),
                        TextInput::make('residence_place_en')
                            ->label(__('filament-panels::pages/licence.form.residence_place_en'))
                            ->placeholder('Damascus')
                            ->rules([new AlphaWithSpaces()])
                            ->helperText('يرجى استخدام أحرف انكليزية فقط بدون أرقام أو رموز إضافية.')
                            ->required()
                            ->maxLength(255),
                    ]),
            Step::make(__('filament-panels::pages/licence.wizard.contact'))->columns([
                'default' => 1,
                'xl' => 2,
                '2xl' => 4,
            ])->schema([
                        TextInput::make('phone')
                            ->label(__('filament-panels::pages/licence.form.phone'))
                            ->required(false)
                            ->numeric()
                            ->mask('0999999999')
                            ->placeholder('0999999999')
                            ->maxLength(255),
                        TextInput::make('email')
                            ->label(__('filament-panels::pages/licence.form.email'))
                            ->required(false)
                            ->email()
                            ->maxLength(255),
                        TextInput::make('note')
                            ->label(__('filament-panels::pages/licence.form.note'))
                            ->required(false)
                            ->columnSpan(2)
                            ->maxLength(255),
                    ]),
            Step::make(__('filament-panels::pages/licence.wizard.files'))->columns([
                'default' => 1,
                'xl' => 3,
                '2xl' => 4,
            ])->schema([
                        FileUpload::make('personal')
                            ->label(__('filament-panels::pages/licence.form.files.personal'))
                            ->maxSize(2048)
                            ->helperText('الحجم الأعظمي للملف هو 2 ميغابايت.')
                            ->image()
                            ->required(false),
                        FileUpload::make('licence_f')
                            ->label(__('filament-panels::pages/licence.form.files.licence_f'))
                            ->maxSize(2048)
                            ->helperText('الحجم الأعظمي للملف هو 2 ميغابايت.')
                            ->image()
                            ->required(false),
                        FileUpload::make('licence_b')
                            ->label(__('filament-panels::pages/licence.form.files.licence_b'))
                            ->maxSize(2048)
                            ->helperText('الحجم الأعظمي للملف هو 2 ميغابايت.')
                            ->image()
                            ->required(false),
                        FileUpload::make('licence1')
                            ->label(__('filament-panels::pages/licence.form.files.licence1'))
                            ->maxSize(2048)
                            ->helperText('الحجم الأعظمي للملف هو 2 ميغابايت.')
                            ->image()
                            ->required(false),
                        FileUpload::make('licence2')
                            ->label(__('filament-panels::pages/licence.form.files.licence2'))
                            ->maxSize(2048)
                            ->helperText('الحجم الأعظمي للملف هو 2 ميغابايت.')
                            ->image()
                            ->required(false),
                        FileUpload::make('id_f')
                            ->label(__('filament-panels::pages/licence.form.files.id_f'))
                            ->maxSize(2048)
                            ->helperText('الحجم الأعظمي للملف هو 2 ميغابايت.')
                            ->image()
                            ->required(false),
                        FileUpload::make('id_b')
                            ->label(__('filament-panels::pages/licence.form.files.id_b'))
                            ->maxSize(2048)
                            ->helperText('الحجم الأعظمي للملف هو 2 ميغابايت.')
                            ->image()
                            ->required(false),
                    ]),
        ];
    }
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $data;
    }
}
