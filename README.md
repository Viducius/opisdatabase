Opis Database
=============
[![Build Status](https://travis-ci.org/opis/database.png)](https://travis-ci.org/opis/database)
[![Latest Stable Version](https://poser.pugx.org/opis/database/version.png)](https://packagist.org/packages/opis/database)
[![Latest Unstable Version](https://poser.pugx.org/opis/database/v/unstable.png)](//packagist.org/packages/opis/database)
[![License](https://poser.pugx.org/opis/database/license.png)](https://packagist.org/packages/opis/database)

Database abstraction layer
-------------------------
**Opis Database** is a library that provides an abstraction layer over several database systems,
offering a standard way of handling database records and thus, making the differences between various SQL dialects
irrelevant for developers.

The library has support for the following database types: MySQL, PostgreSQL, Microsoft SQL, SQLite, Firebird, IBM DB2, Oracle, NuoDB. 

### License

**Opis Database** is licensed under the [Apache License, Version 2.0](http://www.apache.org/licenses/LICENSE-2.0). 

### Requirements

* PHP 7.0.* or higher
* PDO

### Installation

This library is available on [Packagist](https://packagist.org/packages/opis/database) and can be installed using [Composer](http://getcomposer.org).

```json
{
    "require": {
        "opis/database": "4.0.x-dev"
    }
}
```

If you are unable to use [Composer](http://getcomposer.org) you can download the
[tar.gz](https://github.com/opis/database/archive/master.tar.gz) or the [zip](https://github.com/opis/database/archive/master.zip) archive file, extract the content of the archive and include de `autoload.php` file into your project. 

```php

require_once 'path/to/database-master/autoload.php';

```

### Documentation

Examples and documentation about this library can be found [here](http://opis.io/database).
