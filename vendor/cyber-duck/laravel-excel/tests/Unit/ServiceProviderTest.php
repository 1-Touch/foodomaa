<?php

class ExcelServiceProviderTest extends TestCase
{
    public function test_service_provider()
    {
        //Test services
        $this->assertTrue($this->app->bound('cyber-duck/exporter'));
        $this->assertTrue($this->app->bound('cyber-duck/importer'));
        $this->assertInstanceOf(
            \Cyberduck\LaravelExcel\Factory\ExporterFactory::class,
            $this->app->make('cyber-duck/exporter')
        );
        $this->assertInstanceOf(
            \Cyberduck\LaravelExcel\Factory\ImporterFactory::class,
            $this->app->make('cyber-duck/importer')
        );
        //Test aliases
        $this->assertInstanceOf(
            \Cyberduck\LaravelExcel\Exporter\AbstractSpreadsheet::class,
            Exporter::make("Excel")
        );
        $this->assertInstanceOf(
            \Cyberduck\LaravelExcel\Importer\AbstractSpreadsheet::class,
            Importer::make("Excel")
        );
    }
}
