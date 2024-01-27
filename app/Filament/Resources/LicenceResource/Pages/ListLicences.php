<?php

namespace App\Filament\Resources\LicenceResource\Pages;

use App\Filament\Resources\LicenceResource;
use App\Models\Licence;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListLicences extends ListRecords
{
    protected static string $resource = LicenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('archive')
                ->label(__('filament-panels::pages/licence.archive'))
                ->action('archiveLicences')
        ];
    }

    public function archiveLicences(): void
    {
        if (auth()->user()->hasRole('admin')) {
            Licence::query()->where(['api_read' => true])->update(['archived' => true]);
        }
    }
    public function getTableQuery(): Builder
    {
        return self::$resource::getEloquentQuery()->where('archived', false);
    }
}
