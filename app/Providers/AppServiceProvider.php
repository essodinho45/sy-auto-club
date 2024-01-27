<?php

namespace App\Providers;

use App\Filament\Resources\LicenceResource\Pages\ArchivedLicences;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Model::unguard();
        Filament::serving(function () {
            Filament::registerNavigationItems([
                NavigationItem::make('Archived Licences')
                    ->icon('heroicon-o-clipboard-document-check')
                    ->activeIcon('heroicon-s-clipboard-document-check')
                    ->label(__('filament-panels::pages/licence.archived_licences'))
                    ->url(route('filament.admin.resources.licences.archive'))
                    ->isActiveWhen(fn() => request()->routeIs('filament.admin.resources.licences.archive'))
                    ->sort(2),
            ]);
        });
    }
}
