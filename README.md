<h1 align="center">
    <img src="http://cdn.florian.ec/plum-logo.svg" alt="Plum" width="300">
</h1>

> PlumJsons includes readers, writers and converters for JSON strings and files.  Plum is a data processing pipeline
for PHP.

[![Build Status](https://img.shields.io/travis/plumphp/plum-json.svg?style=flat)](https://travis-ci.org/plumphp/plum-json)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/plumphp/plum-json.svg?style=flat)](https://scrutinizer-ci.com/g/plumphp/plum-json/?branch=master)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/plumphp/plum-json.svg?style=flat)](https://scrutinizer-ci.com/g/plumphp/plum-json/?branch=master)

Developed by [Florian Eckerstorfer](https://florian.ec) in Vienna, Europe.


Features
--------

### Readers

- `JsonFileReader` reads a `.json` file from disk and decodes it
- `JsonReader` decodes a JSON string

### Writers

- `JsonFileWriter` encodes an object/array into JSON and saves it to disk
- `JsonWriter` encodes an object/array into JSON and returns the string

### Converters

- `JsonDecodeConverter` takes a JSON string and decodes it
- `JsonEncodeConverter` takes an object/array and encodes it to JSON


Installation
------------

You can install Plum using [Composer](http://getcomposer.org).

```shell
$ composer require plumphp/plum-json
```


Usage
-----

Please refer to the [Plum documentation](https://github.com/plumphp/plum/blob/master/docs/index.md) for more
information about Plum in general.

### `JsonReader`

`Plum\PlumJson\JsonReader` reads a JSON string. If you want to read a `.json` file checkout
[JsonFileReader](#jsonfilereader).

```php
use Plum\PlumJson\JsonReader;

$reader = new JsonReader('[{'key1': 'value1', 'key2': 'value2'}]');
$reader->getIterator(); // -> \ArrayIterator
$reader->count();
```

### `JsonFileReader`

`Plum\PlumJson\JsonFileReader` reads a `.json` file.

```php
use Plum\PlumJson\JsonFileReader;

$reader = new JsonFileReader('foo.json');
$reader->getIterator(); // -> \ArrayIterator
$reader->count();
```

### `JsonFileWriter`

`Plum\PlumJson\JsonFileWriter` writes the items as JSON into a file.

```php
use Plum\PlumJson\JsonFileWriter;

$writer = new JsonFileWriter('foobar.json');
$writer->writeItem(['key1' => 'value1', 'key2' => 'value2'));
$writer->finish();
```

It is essential that `finish()` is called, because there happens the actual writing. The `prepare()` method does
nothing.

### `JsonWriter`

`Plum\PlumJson\JsonWriter` converts the items into JSON format. Please checkout [JsonFileWriter](#jsonfilewriter) if you
want to write the JSON into a file.

```php
use Plum\PlumJson\JsonWriter;

$writer = new JsonWriter();
$writer->writeItem(['key1' => 'value1', 'key2' => 'value2'));
echo $writer->getJson(); // [{'key1': 'value1', 'key2': 'value2'}]
```

### `JsonDecodeConverter`

`Plum\PlumJson\JsonDecodeConverter` uses [Braincrafted\Json](https://github.com/braincrafted/json) to decode JSON.

```php
use Plum\PlumJson\JsonDecodeConverter;
use Braincrafted\Json\Json;

$converter = new JsonDecodeConverter(Json::DECODE_ASSOC);
$converter->convert('{"foo": "bar"}'); // -> ['foo' => 'bar']
```

### `JsonEncodeConverter`

`Plum\PlumJson\JsonEncodeConverter` uses [Braincrafted\Json](https://github.com/braincrafted/json) to encode an object
into JSON.

```php
use Plum\PlumJson\JsonEncodeConverter;

$converter = new JsonEncodeConverter();
$converter->convert(['foo' => 'bar']); // -> '{"foo": "bar"}'
```


Change Log
----------

### Version 0.3 (7 May 2015)

- Add `JsonDecodeConverter`
- Add `JsonEncodeConverter`

### Version 0.2 (22 April 2015)

- Add support for ReaderFactory

### Version 0.1 (17 February 2015)

- Initial release


License
-------

The MIT license applies to plumphp/plum- json. For the full copyright and license information,
please view the [LICENSE](https://github.com/plumphp/plum-json/blob/master/LICENSE) file distributed with this source
code.
