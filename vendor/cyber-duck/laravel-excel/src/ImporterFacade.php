<?php
namespace Cyberduck\LaravelExcel;

use Illuminate\Support\Facades\Facade;

class ImporterFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cyber-duck/importer';
    }
}
