<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        for ($j = 0; $j<1000; $j++) {
            $rows = [];
            for ($i = 0; $i<50; $i++) {
                $rows[] = [
                    'field1' => 'A',
                    'field2' => 'B',
                    'field3' => 'C',
                    'field4' => 'D',
                    'field5' => 'E',
                    'field6' => 'F',
                    'field7' => 'G',
                    'field8' => 'H',
                    'field9' => 'I',
                    'field10' => 'J',
                    'field11' => 'K',
                    'field12' => 'L',
                    'field13' => 'M',
                    'field14' => 'N',
                    'field15' => 'O',
                ];
            }
            DB::table('items')->insert($rows);
        }
    }
}