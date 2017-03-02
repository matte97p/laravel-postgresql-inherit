PostgresqlSchema
================

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat)](LICENSE.md)

Add inheritance in postgresql tables

## Installation
[PHP](https://php.net) 5.4+ and [Laravel](https://laravel.com) 5.2+ are required.

To get the latest version of PostgreSQL Schema, simply run this command
```shell
composer require "rishi-ramawat/laravel-postgresql-inherit ~2.1"
```

Once PostgreSQL Schema is installed, you need to register the service provider. Open up `app/config/app.php` and add the following to the `providers` key.

```php
RishiRamawat\PostgresSchema\PostgresqlSchemaServiceProvider::class
```

## Usage

In migration file when using a postgresql database, you can use the new method `inherits()`:

```php

Schema::create('cities', function(Blueprint $table) {
  $table->increments('id');
  $table->string('name');
  $table->double('population');
  $table->integer('altitude')->comment('In Feet');
});

Schema::create('capitals', function(Blueprint $table) {
    $table->string('state');
    // Make capitals table inherits all the columns of its parent table, cities
    $table->inherits('cities');
});

```
