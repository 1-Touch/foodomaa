# Laravel Excel
[![Latest Stable Version](https://poser.pugx.org/cyber-duck/laravel-excel/v/stable)](https://packagist.org/packages/cyber-duck/laravel-excel)
[![Total Downloads](https://poser.pugx.org/cyber-duck/laravel-excel/downloads)](https://packagist.org/packages/cyber-duck/laravel-excel)
[![License](https://poser.pugx.org/cyber-duck/laravel-excel/license)](https://raw.githubusercontent.com/Cyber-Duck/laravel-excel/master/LICENSE)

Exporting and importing Excel, CSV and OpenOffice stylesheets using Eloquent Collections and Query Builders in Laravel (5.* and 4.*).  
It's based on [box/spout](https://github.com/box/spout).

Author: [Simone Todaro](https://github.com/SimoTod)  
Contributors: [Clément Blanco](https://github.com/Claymm)  
Made with :heart: by [Cyber-Duck Ltd](http://www.cyber-duck.co.uk)

[Installation](#installation)  
[Export Excel](#export-excel)  
[Import Excel](#import-excel)  
[Different formats](#different-formats)  

## Installation
Use composer to download the package:
```
composer require cyber-duck/laravel-excel
```

### Laravel 4.x

Register the service provider in `config/app.php` by adding this line to providers array.

```php
'providers' => [
	Cyberduck\LaravelExcel\ExcelLegacyServiceProvider::class,
],
```

### Laravel < 5.5

Register the service provider in `config/app.php` by adding this line to providers array.

```php
'providers' => [
	Cyberduck\LaravelExcel\ExcelServiceProvider::class,
],
```

### Laravel 5.5

No need to register anything, since it used package auto discovery feature in Laravel 5.5.

## Export Excel

### Generate and download an excel file
Add
```
use Exporter;
```
to your controller.

In your controler function, create a new excel file from an Eloquent collection.
```
$excel = Exporter::make('Excel');
$excel->load($yourCollection);
return $excel->stream($yourFileName);
```

The exporter class is fluent, so you can also write  
```
return Exporter::make('Excel')->load($yourCollection)->stream($yourFileName);
```

The exporter class supports Query builder objects as well
```
$query = DB:table('table')->select('col1','col2');
$excel = Exporter::make('Excel');
$excel->loadQuery($query);
return $excel->stream($yourFileName);
```

If you deal with big tables, you can set the chunk size to minimise the memory usage
```
$query = DB:table('table')->select('col1','col2');
$excel = Exporter::make('Excel');
$excel->loadQuery($query);
$excel->setChunk(1000);
return $excel->stream($yourFileName);
```

### Generate and save an excel file
To save the excel file on the server, use the save method.
```
return $excel->save($yourFileNameWithPath);
```

### Advanced usage
By default, every element of the Collection becomes a row and every unprotected field of the Model becomes a cell.  
No headers row is printed.

To change this behaviour, create a class extending *Cyberduck\LaravelExcel\Contract\SerialiserInterface*, implement the methods *getHeaderRow()* and *getData(Model $data)* and set this class on the excel object usint *setSerialiser()*.
```
$serialiser = new CustomSerialiser();
$excel = Exporter::make('Excel');
$excel->load($collection);
$excel->setSerialiser($serialiser);
return $excel->stream($yourFileName);
```

*getHeaderRow()* must return an array of string where every element is a cell of the first row. To not print the header row, simply return a void array *[]*.  
*getData(Model $data)* must return an array of string, and every elements is a cell.

Example
```
namespace App\Serialisers;

use Illuminate\Database\Eloquent\Model;
use Cyberduck\LaravelExcel\Contract\SerialiserInterface;

class ExampleSerialiser implements SerialiserInterface
{
    public function getData($data)
    {
        $row = [];

        $row[] = $data->field1;
        $row[] = $data->relationship->field2;

        return $row;
    }

    public function getHeaderRow()
    {
        return [
            'Field 1',
            'Field 2 (from a relationship)'
        ];
    }
}
```
then set the serialiser before saving the file the collection.
```
$collection = Exporter::make('Excel')->load($yourCollection)->setSerialiser(new ExampleSerialiser)->stream($yourFileName);
```

## Import Excel
Add
```
use Importer;
```
to your controller.

In your controler function, import an excel file.
```
$excel = Importer::make('Excel');
$excel->load($filepath);
$collection = $excel->getCollection();
//dd($collection)
```

The importer class is fluent, then you can also write
```
return Importer::make('Excel')->load($filepath)->getCollection();
```

### Advanced usage
By default, every row of the first sheet of the excel file becomes an array and the final result is wraped in a Collection (Illuminate\Support\Collection).  

To import a different sheet, use *setSheet($sheet)*
```
$excel = Importer::make('Excel');
$excel->load($filepath);
$excel->setSheet($sheetNumber);
$collection = $excel->getCollection();
//dd($collection)
```

To import each row in an Eloquent model, create a class extending *Cyberduck\LaravelExcel\Contract\ParserInterface* and implement the methods *transform($row)*.  

Example
```
namespace App\Parsers;

use App\Models\YourModel;
use Cyberduck\LaravelExcel\Contract\ParserInterface;

class ExampleParser implements ParserInterface
{
    public function transform($row, $header)
    {
        $model = new YourModel();
        $model->field1 = $row[0];
        $model->field2 = $row[1];
        // We can manunipulate the data before returning the object
        $model->field3 = new \Carbon($row[2]);
        return $model;
    }
}
```
then set the parser before creating the collection.
```
$collection = Importer::make('Excel')->load($filepath)->setParser(new ExampleParser)->getCollection();
```

## Different formats
The package supports ODS and CSV files.

### ODS
```
$exporter = Exporter::make('OpenOffice');
$importer = Importer::make('OpenOffice');
```

### CSV
```
$exporter = Exporter::make('Csv');
$importer = Importer::make('Csv');
```
