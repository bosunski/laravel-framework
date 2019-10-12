<?php

namespace Illuminate\Tests\Database;

use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Grammars\MySqlGrammar;
use Illuminate\Database\Schema\Grammars\PostgresGrammar;
use Illuminate\Database\Schema\Grammars\SQLiteGrammar;
use Illuminate\Database\Schema\Grammars\SqlServerGrammar;
use Illuminate\Support\Facades\Facade;
use PHPUnit\Framework\TestCase;

class DatabaseSchemaBlueprintIntegrationTest extends TestCase
{
    protected $db;

    /**
     * Bootstrap Eloquent.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->db = $db = new DB;

        $db->addConnection([
            'driver' => 'sqlite',
            'database' => ':memory:',
        ]);

        $db->setAsGlobal();

        $container = new Container;
        $container->instance('db', $db->getDatabaseManager());
        Facade::setFacadeApplication($container);
    }

    protected function tearDown(): void
    {
        Facade::clearResolvedInstances();
        Facade::setFacadeApplication(null);
    }

    public function testRenamingAndChangingColumnsWork()
    {
        $this->db->connection()->getSchemaBuilder()->create('users', function ($table) {
            $table->string('name');
            $table->string('age');
        });

        $blueprint = new Blueprint('users', function ($table) {
            $table->renameColumn('name', 'first_name');
            $table->integer('age')->change();
        });

        $queries = $blueprint->toSql($this->db->connection(), new SQLiteGrammar);

        $expected = [
            'CREATE TEMPORARY TABLE __temp__users AS SELECT name, age FROM users',
            'DROP TABLE users',
            'CREATE TABLE users (name VARCHAR(255) NOT NULL COLLATE BINARY, age INTEGER NOT NULL COLLATE BINARY)',
            'INSERT INTO users (name, age) SELECT name, age FROM __temp__users',
            'DROP TABLE __temp__users',
            'CREATE TEMPORARY TABLE __temp__users AS SELECT name, age FROM users',
            'DROP TABLE users',
            'CREATE TABLE users (age VARCHAR(255) NOT NULL COLLATE BINARY, first_name VARCHAR(255) NOT NULL)',
            'INSERT INTO users (first_name, age) SELECT name, age FROM __temp__users',
            'DROP TABLE __temp__users',
        ];

        $this->assertEquals($expected, $queries);
    }

    public function testChangingColumnWithCollationWorks()
    {
        $this->db->connection()->getSchemaBuilder()->create('users', function ($table) {
            $table->string('age');
        });

        $blueprint = new Blueprint('users', function ($table) {
            $table->integer('age')->collation('RTRIM')->change();
        });

        $blueprint2 = new Blueprint('users', function ($table) {
            $table->integer('age')->collation('NOCASE')->change();
        });

        $queries = $blueprint->toSql($this->db->connection(), new SQLiteGrammar);
        $queries2 = $blueprint2->toSql($this->db->connection(), new SQLiteGrammar);

        $expected = [
            'CREATE TEMPORARY TABLE __temp__users AS SELECT age FROM users',
            'DROP TABLE users',
            'CREATE TABLE users (age INTEGER NOT NULL COLLATE RTRIM)',
            'INSERT INTO users (age) SELECT age FROM __temp__users',
            'DROP TABLE __temp__users',
        ];

        $expected2 = [
            'CREATE TEMPORARY TABLE __temp__users AS SELECT age FROM users',
            'DROP TABLE users',
            'CREATE TABLE users (age INTEGER NOT NULL COLLATE NOCASE)',
            'INSERT INTO users (age) SELECT age FROM __temp__users',
            'DROP TABLE __temp__users',
        ];

        $this->assertEquals($expected, $queries);
        $this->assertEquals($expected2, $queries2);
    }

    public function testRenameIndexWorks()
    {
        $this->db->connection()->getSchemaBuilder()->create('users', function ($table) {
            $table->string('name');
            $table->string('age');
        });

        $this->db->connection()->getSchemaBuilder()->table('users', function ($table) {
            $table->index(['name'], 'index1');
        });

        $blueprint = new Blueprint('users', function ($table) {
            $table->renameIndex('index1', 'index2');
        });

        $queries = $blueprint->toSql($this->db->connection(), new SQLiteGrammar);

        $expected = [
            'DROP INDEX index1',
            'CREATE INDEX index2 ON users (name)',
        ];

        $this->assertEquals($expected, $queries);

        $queries = $blueprint->toSql($this->db->connection(), new SqlServerGrammar);

        $expected = [
            'sp_rename N\'"users"."index1"\', "index2", N\'INDEX\'',
        ];

        $this->assertEquals($expected, $queries);

        $queries = $blueprint->toSql($this->db->connection(), new MySqlGrammar);

        $expected = [
            'alter table `users` rename index `index1` to `index2`',
        ];

        $this->assertEquals($expected, $queries);

        $queries = $blueprint->toSql($this->db->connection(), new PostgresGrammar);

        $expected = [
            'alter index "index1" rename to "index2"',
        ];

        $this->assertEquals($expected, $queries);
    }
}
