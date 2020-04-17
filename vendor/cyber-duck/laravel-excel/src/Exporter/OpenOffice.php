<?php
namespace Cyberduck\LaravelExcel\Exporter;

use Box\Spout\Common\Type;

class OpenOffice extends AbstractSpreadsheet
{
    public function getType()
    {
        return Type::ODS;
    }
}
