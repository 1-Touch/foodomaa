<?php
namespace Cyberduck\LaravelExcel;

use Cyberduck\LaravelExcel\Factory\ExporterFactory;
use Cyberduck\LaravelExcel\Factory\ImporterFactory;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class ExcelLegacyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $loader = AliasLoader::getInstance();
        $loader->alias('Exporter', '\Cyberduck\LaravelExcel\ExporterFacade');
        $loader->alias('Importer', '\Cyberduck\LaravelExcel\ImporterFacade');
    }

    public function register()
    {
        $this->app->bind('cyber-duck/exporter', function () {
            return new ExporterFactory();
        });
        $this->app->bind('cyber-duck/importer', function () {
            return new ImporterFactory();
        });
    }
}
