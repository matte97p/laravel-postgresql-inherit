<?php

namespace RishiRamawat\PostgresSchema;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application as App;

class PostgresqlSchemaServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('db.connection.pgsql', function (App $app, array $parameters) {
            list($connection, $database, $prefix, $config) = $parameters;

            return new PostgresConnection($connection, $database, $prefix, $config);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
