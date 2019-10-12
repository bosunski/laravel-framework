<?php

namespace Illuminate\Tests\Foundation;

use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;
use Mockery as m;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;

class FoundationInteractsWithDatabaseTest extends TestCase
{
    use InteractsWithDatabase;

    protected $table = 'products';

    protected $data = ['title' => 'Spark'];

    protected $connection;

    protected function setUp(): void
    {
        $this->connection = m::mock(Connection::class);
    }

    protected function tearDown(): void
    {
        m::close();
    }

    public function testSeeInDatabaseFindsResults()
    {
        $this->mockCountBuilder(1);

        $this->assertDatabaseHas($this->table, $this->data);
    }

    public function testSeeInDatabaseDoesNotFindResults()
    {
        $this->expectException(ExpectationFailedException::class);
        $this->expectExceptionMessage('The table is empty.');

        $builder = $this->mockCountBuilder(0);

        $builder->shouldReceive('get')->andReturn(collect());

        $this->assertDatabaseHas($this->table, $this->data);
    }

    public function testSeeInDatabaseFindsNotMatchingResults()
    {
        $this->expectException(ExpectationFailedException::class);

        $this->expectExceptionMessage('Found: '.json_encode([['title' => 'Forge']], JSON_PRETTY_PRINT));

        $builder = $this->mockCountBuilder(0);

        $builder->shouldReceive('take')->andReturnSelf();
        $builder->shouldReceive('get')->andReturn(collect([['title' => 'Forge']]));

        $this->assertDatabaseHas($this->table, $this->data);
    }

    public function testSeeInDatabaseFindsManyNotMatchingResults()
    {
        $this->expectException(ExpectationFailedException::class);

        $this->expectExceptionMessage('Found: '.json_encode(['data', 'data', 'data'], JSON_PRETTY_PRINT).' and 2 others.');

        $builder = $this->mockCountBuilder(0);
        $builder->shouldReceive('count')->andReturn(0, 5);

        $builder->shouldReceive('take')->andReturnSelf();
        $builder->shouldReceive('get')->andReturn(
            collect(array_fill(0, 3, 'data'))
        );

        $this->assertDatabaseHas($this->table, $this->data);
    }

    public function testDontSeeInDatabaseDoesNotFindResults()
    {
        $this->mockCountBuilder(0);

        $this->assertDatabaseMissing($this->table, $this->data);
    }

    public function testDontSeeInDatabaseFindsResults()
    {
        $this->expectException(ExpectationFailedException::class);

        $builder = $this->mockCountBuilder(1);

        $builder->shouldReceive('take')->andReturnSelf();
        $builder->shouldReceive('get')->andReturn(collect([$this->data]));

        $this->assertDatabaseMissing($this->table, $this->data);
    }

    public function testAssertSoftDeletedInDatabaseFindsResults()
    {
        $this->mockCountBuilder(1);

        $this->assertSoftDeleted($this->table, $this->data);
    }

    public function testAssertSoftDeletedInDatabaseDoesNotFindResults()
    {
        $this->expectException(ExpectationFailedException::class);
        $this->expectExceptionMessage('The table is empty.');

        $builder = $this->mockCountBuilder(0);

        $builder->shouldReceive('get')->andReturn(collect());

        $this->assertSoftDeleted($this->table, $this->data);
    }

    public function testAssertSoftDeletedInDatabaseDoesNotFindModelResults()
    {
        $this->expectException(ExpectationFailedException::class);
        $this->expectExceptionMessage('The table is empty.');

        $this->data = ['id' => 1];

        $builder = $this->mockCountBuilder(0);

        $builder->shouldReceive('get')->andReturn(collect());

        $this->assertSoftDeleted(new ProductStub($this->data));
    }

    public function testAssertSoftDeletedInDatabaseDoesNotFindModelWithCustomColumnResults()
    {
        $this->expectException(ExpectationFailedException::class);
        $this->expectExceptionMessage('The table is empty.');

        $this->data = ['id' => 1];

        $builder = $this->mockCountBuilder(0, 'trashed_at');

        $builder->shouldReceive('get')->andReturn(collect());

        $this->assertSoftDeleted(new CustomProductStub($this->data));
    }

    protected function mockCountBuilder($countResult, $deletedAtColumn = 'deleted_at')
    {
        $builder = m::mock(Builder::class);

        $builder->shouldReceive('limit')->andReturnSelf();

        $builder->shouldReceive('where')->with($this->data)->andReturnSelf();

        $builder->shouldReceive('whereNotNull')->with($deletedAtColumn)->andReturnSelf();

        $builder->shouldReceive('count')->andReturn($countResult)->byDefault();

        $this->connection->shouldReceive('table')
            ->with($this->table)
            ->andReturn($builder);

        return $builder;
    }

    protected function getConnection()
    {
        return $this->connection;
    }
}

class ProductStub extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $guarded = [];
}

class CustomProductStub extends ProductStub
{
    const DELETED_AT = 'trashed_at';
}
