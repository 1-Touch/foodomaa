<?php
namespace Cyberduck\LaravelExcel\Factory;

use ReflectionClass;

class ImporterFactory
{
    public function make($type)
    {
        $class = new ReflectionClass('Cyberduck\\LaravelExcel\\Importer\\'.$type);
        return $class->newInstanceArgs(array());
    }
}
