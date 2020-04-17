<?php

class ExporterFacadeTest extends TestCase
{
    public function test_facades_are_available()
    {
        $this->assertInstanceOf(
            \Cyberduck\LaravelExcel\Factory\ExporterFactory::class,
            Exporter::getFacadeRoot()
        );
        $this->assertInstanceOf(
            \Cyberduck\LaravelExcel\Factory\ImporterFactory::class,
            Importer::getFacadeRoot()
        );
    }
}
