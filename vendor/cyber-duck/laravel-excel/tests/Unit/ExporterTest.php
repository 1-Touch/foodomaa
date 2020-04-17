<?php
use Box\Spout\Common\Type;
use Box\Spout\Reader\ReaderFactory;
use Cyberduck\LaravelExcel\Factory\ImporterFactory;

class ExporterTest extends TestCase
{
    const FILE = __DIR__.'/../docs/test.xlsx';

    public function setUp()
    {
        parent::setUp();
        (new Migration)->up();
    }

    public function tearDown()
    {
        (new Migration)->down();
        parent::tearDown();
    }

    public function test_can_export_csv()
    {
        $itemsToSeed = 2;
        $this->seed($itemsToSeed);

        //Export the file
        $exporter = $this->app->make('cyber-duck/exporter')->make('csv');
        $exporter->load(Item::all())->save(self::FILE);

        //Read the content
        $lines = 0;
        $reader = ReaderFactory::create(Type::CSV);
        $reader->open(self::FILE);
        foreach ($reader->getSheetIterator() as $index => $sheet) {
            foreach ($sheet->getRowIterator() as $row) {
                $this->assertEquals(array_values(self::DEFAULT_ROW), $row);
                $lines++;
            }
        }
        $reader->close();
        $this->assertEquals($itemsToSeed, $lines);

        unlink(self::FILE);
    }

    public function test_can_export_odt()
    {
        $itemsToSeed = 2;
        $this->seed($itemsToSeed);

        //Export the file
        $exporter = $this->app->make('cyber-duck/exporter')->make('openoffice');
        $exporter->load(Item::all())->save(self::FILE);

        //Read the content
        $lines = 0;
        $reader = ReaderFactory::create(Type::ODS);
        $reader->open(self::FILE);
        foreach ($reader->getSheetIterator() as $index => $sheet) {
            foreach ($sheet->getRowIterator() as $row) {
                $this->assertEquals(array_values(self::DEFAULT_ROW), $row);
                $lines++;
            }
        }
        $reader->close();
        $this->assertEquals($itemsToSeed, $lines);

        unlink(self::FILE);
    }

    public function test_can_export_xlsx()
    {
        $itemsToSeed = 2;
        $this->seed($itemsToSeed);

        //Export the file
        $exporter = $this->app->make('cyber-duck/exporter')->make('excel');
        $exporter->load(Item::all())->save(self::FILE);

        //Read the content
        $lines = 0;
        $reader = ReaderFactory::create(Type::XLSX);
        $reader->open(self::FILE);
        foreach ($reader->getSheetIterator() as $index => $sheet) {
            foreach ($sheet->getRowIterator() as $row) {
                $this->assertEquals(array_values(self::DEFAULT_ROW), $row);
                $lines++;
            }
        }
        $reader->close();
        $this->assertEquals($itemsToSeed, $lines);

        unlink(self::FILE);
    }

    public function test_can_use_a_query_builder()
    {
        $itemsToSeed = 2;
        $this->seed($itemsToSeed);

        //Export the file
        $exporter = $this->app->make('cyber-duck/exporter')->make('csv');
        $exporter->loadQuery(Item::getQuery())->save(self::FILE);

        //Read the content
        $lines = 0;
        $reader = ReaderFactory::create(Type::CSV);
        $reader->open(self::FILE);
        foreach ($reader->getSheetIterator() as $index => $sheet) {
            foreach ($sheet->getRowIterator() as $idx => $row) {
                $expected = array_merge([strval($idx)], array_values(self::DEFAULT_ROW));
                $this->assertEquals($expected, $row);
                $lines++;
            }
        }
        $reader->close();
        $this->assertEquals($itemsToSeed, $lines);

        unlink(self::FILE);
    }

    public function test_can_use_a_query_builder_with_chunk()
    {
        $itemsToSeed = 2;
        $this->seed($itemsToSeed);

        //Export the file
        $exporter = $this->app->make('cyber-duck/exporter')->make('csv');
        $exporter->loadQuery(Item::getQuery())->setChunk(2)->save(self::FILE);

        //Read the content
        $lines = 0;
        $reader = ReaderFactory::create(Type::CSV);
        $reader->open(self::FILE);
        foreach ($reader->getSheetIterator() as $index => $sheet) {
            foreach ($sheet->getRowIterator() as $idx => $row) {
                $expected = array_merge([strval($idx)], array_values(self::DEFAULT_ROW));
                $this->assertEquals($expected, $row);
                $lines++;
            }
        }
        $reader->close();
        $this->assertEquals($itemsToSeed, $lines);

        unlink(self::FILE);
    }

    public function test_can_use_a_custom_serialiser()
    {
        $itemsToSeed = 2;
        $this->seed($itemsToSeed);

        //Export the file
        $exporter = $this->app->make('cyber-duck/exporter')->make('csv');
        $exporter->setSerialiser(new FirstColumnOnlySerialiser())->load(Item::all())->save(self::FILE);

        //Read the content
        $lines = 0;
        $reader = ReaderFactory::create(Type::CSV);
        $reader->open(self::FILE);
        foreach ($reader->getSheetIterator() as $index => $sheet) {
            foreach ($sheet->getRowIterator() as $row) {
                if ($lines == 0) {
                    $this->assertEquals(['HEADER'], $row);
                } else {
                    $this->assertEquals(['A'], $row);
                }
                $lines++;
            }
        }
        $reader->close();

        unlink(self::FILE);
    }
}
