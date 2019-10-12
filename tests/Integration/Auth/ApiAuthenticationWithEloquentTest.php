<?php

namespace Illuminate\Tests\Integration\Auth\ApiAuthenticationWithEloquentTest;

use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\User as FoundationUser;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Orchestra\Testbench\TestCase;

class ApiAuthenticationWithEloquentTest extends TestCase
{
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('app.debug', 'true');

        // Auth configuration
        $app['config']->set('auth.defaults.guard', 'api');
        $app['config']->set('auth.providers.users.model', User::class);

        // Database configuration
        $app['config']->set('database.default', 'testbench');

        $app['config']->set('database.connections.testbench', [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'username' => 'root',
            'password' => 'invalid-credentials',
            'database' => 'forge',
            'prefix' => '',
        ]);
    }

    public function testAuthenticationViaApiWithEloquentUsingWrongDatabaseCredentialsShouldNotCauseInfiniteLoop()
    {
        Route::get('/auth', function () {
            return 'success';
        })->middleware('auth:api');

        $this->expectException(QueryException::class);

        $this->expectExceptionMessage("SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: YES) (SQL: select * from `users` where `api_token` = whatever limit 1)");

        try {
            $this->withoutExceptionHandling()->get('/auth', ['Authorization' => 'Bearer whatever']);
        } catch (QueryException $e) {
            if (Str::startsWith($e->getMessage(), 'SQLSTATE[HY000] [2002]')) {
                $this->markTestSkipped('MySQL instance required.');
            }

            throw $e;
        }
    }
}

class User extends FoundationUser
{
    //
}
