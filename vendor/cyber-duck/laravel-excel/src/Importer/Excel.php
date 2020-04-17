<?php
namespace Cyberduck\LaravelExcel\Importer;

use Box\Spout\Common\Type;

class Excel extends AbstractSpreadsheet
{
    public function getType()
    {
        return Type::XLSX;
    }
}
