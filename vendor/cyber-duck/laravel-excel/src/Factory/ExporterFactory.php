<?php
namespace Cyberduck\LaravelExcel\Factory;

use ReflectionClass;

class ExporterFactory
{
    public function make($type)
    {
        $class = new ReflectionClass('Cyberduck\\LaravelExcel\\Exporter\\'.$type);
        return $class->newInstanceArgs(array());
    }
}
