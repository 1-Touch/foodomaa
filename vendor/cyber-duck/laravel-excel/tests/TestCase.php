<?php

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected $baseUrl = 'http://localhost';

    const DEFAULT_ROW = [
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

    public function createApplication()
    {
        $app = require __DIR__.'/../vendor/laravel/laravel/bootstrap/app.php';
        $app->register('Cyberduck\LaravelExcel\ExcelServiceProvider');

        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

        return $app;
    }

    /**
     * Setup DB before each test.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->app['config']->set('database.default', 'sqlite');
        $this->app['config']->set('database.connections.sqlite.database', ':memory:');
    }

    public function seed($item = 10)
    {
        for ($j = 0; $j<ceil($item/50); $j++) {
            $rows = [];
            $limit = ($j>floor($item/50)) ? 50 : ($item-($j*50));
            for ($i = 0; $i<$limit; $i++) {
                $rows[] = self::DEFAULT_ROW;
            }
            DB::table('items')->insert($rows);
        }
    }
}
