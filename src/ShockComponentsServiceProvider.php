<?php

namespace Titonova\ShockComponents;

use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Titonova\ShockComponents\Commands\ShockComponentsCommand;
use Titonova\ShockComponents\Livewire\Delete;

class ShockComponentsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('shock-components')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_shock-components_table')
            ->hasCommand(ShockComponentsCommand::class);
    }


    /**
     * Load the livewire components
     */
    public function bootingPackage()
    {
        Livewire::component('shock::delete', Delete::class);
    }
}
