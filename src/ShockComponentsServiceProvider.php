<?php

namespace Titonova\ShockComponents;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Titonova\ShockComponents\Commands\ShockComponentsCommand;

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
}
