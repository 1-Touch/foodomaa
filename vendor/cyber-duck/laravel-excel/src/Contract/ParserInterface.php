<?php
namespace Cyberduck\LaravelExcel\Contract;

interface ParserInterface
{
    public function transform($array, $header);
}
