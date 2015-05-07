<img src="https://florian.ec/img/plum/logo.png" alt="Plum">
====

> Plum is a data processing pipeline that helps you to write structured, reusable and well tested data processing code.
> `plum-json` includes readers, writers and converters for JSON strings and files.

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
information.


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
