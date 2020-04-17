<?php
namespace Cyberduck\LaravelExcel\Contract;

use Illuminate\Database\Eloquent\Model;

interface ImporterInterface
{
    public function load($path);
    public function setParser(ParserInterface $parser);
    public function setModel(Model $model);
    public function setSheet($sheet);
    public function getCollection();
    public function save($updateIfEquals);
}
