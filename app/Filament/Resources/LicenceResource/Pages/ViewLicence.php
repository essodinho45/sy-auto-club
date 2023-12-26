<?php

namespace App\Filament\Resources\LicenceResource\Pages;

use App\Filament\Resources\LicenceResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions\Action;

class ViewLicence extends ViewRecord
{
    protected static string $resource = LicenceResource::class;
    protected function getActions(): array
    {
        $custom_actions = [];
        if(auth()->user()->hasRole('admin'))
        {
            if(!$this->record->approved)
                $custom_actions[] =
                    Action::make('approve')
                    ->label(__('filament-panels::pages/licence.approve'))
                    ->action('approveLicence');
            else
                $custom_actions[] =
                    Action::make('approved')
                    ->label(__('filament-panels::pages/licence.approved'))->disabled(true);
        }
        return $custom_actions;
    }

    public function approveLicence(): void
    {
        if(auth()->user()->hasRole('admin'))
        {
            $this->record->approved = true;
            $this->record->save();
        }
    }
}
