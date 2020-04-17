<?php
namespace Cyberduck\LaravelExcel\Contract;

use Illuminate\Support\Collection;
use Illuminate\Database\Query\Builder;

interface ExporterInterface
{
    public function load(Collection $data);
    public function loadQuery(Builder $query);
    public function setChunk($size);
    public function setSerialiser(SerialiserInterface $serialiser);
    public function save($filename);
    public function stream($filename);
}
