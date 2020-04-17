<?php
namespace Cyberduck\LaravelExcel\Exporter;

use Box\Spout\Common\Type;

class Csv extends AbstractSpreadsheet
{
    public function getType()
    {
        return Type::CSV;
    }
}
