PostgresqlSchema
================

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat)](LICENSE.md)

Add inheritance in postgresql tables

## Installation
[PHP](https://php.net) **8.0+** and [Laravel](https://laravel.com) **10.x** are required.

For latest Laravel Versions see the previous fork. 

For Laravel Versions **10.x**, run the following command to install this package via composer
```shell
composer require "matte97p/laravel-postgresql-inherit ~2.7"
```

Once PostgreSQL Schema is installed, you need to register the service provider. Open up `config/app.php` and add the following to the `providers` array.

```php
RishiRamawat\PostgresSchema\PostgresqlSchemaServiceProvider::class,
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
