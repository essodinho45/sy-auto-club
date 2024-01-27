<?php

namespace App\Filament\Resources\LicenceResource\Pages;

use App\Filament\Resources\LicenceResource;
use App\Models\Licence;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ArchivedLicences extends ListRecords
{
    protected static ?string $slug = 'licences/archived';
    protected static string $resource = LicenceResource::class;
    public function getTableQuery(): Builder
    {
        return self::$resource::getEloquentQuery()->where('archived', true);
    }

}
