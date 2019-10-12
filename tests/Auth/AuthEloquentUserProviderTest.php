<?php

namespace Illuminate\Tests\Auth;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Hashing\Hasher;
use Mockery as m;
use PHPUnit\Framework\TestCase;
use stdClass;

class AuthEloquentUserProviderTest extends TestCase
{
    protected function tearDown(): void
    {
        m::close();
    }

    public function testRetrieveByIDReturnsUser()
    {
        $provider = $this->getProviderMock();
        $mock = m::mock(stdClass::class);
        $mock->shouldReceive('newQuery')->once()->andReturn($mock);
        $mock->shouldReceive('getAuthIdentifierName')->once()->andReturn('id');
        $mock->shouldReceive('where')->once()->with('id', 1)->andReturn($mock);
        $mock->shouldReceive('first')->once()->andReturn('bar');
        $provider->expects($this->once())->method('createModel')->willReturn($mock);
        $user = $provider->retrieveById(1);

        $this->assertSame('bar', $user);
    }

    public function testRetrieveByTokenReturnsUser()
    {
        $mockUser = m::mock(stdClass::class);
        $mockUser->shouldReceive('getRememberToken')->once()->andReturn('a');

        $provider = $this->getProviderMock();
        $mock = m::mock(stdClass::class);
        $mock->shouldReceive('newQuery')->once()->andReturn($mock);
        $mock->shouldReceive('getAuthIdentifierName')->once()->andReturn('id');
        $mock->shouldReceive('where')->once()->with('id', 1)->andReturn($mock);
        $mock->shouldReceive('first')->once()->andReturn($mockUser);
        $provider->expects($this->once())->method('createModel')->willReturn($mock);
        $user = $provider->retrieveByToken(1, 'a');

        $this->assertEquals($mockUser, $user);
    }

    public function testRetrieveTokenWithBadIdentifierReturnsNull()
    {
        $provider = $this->getProviderMock();
        $mock = m::mock(stdClass::class);
        $mock->shouldReceive('newQuery')->once()->andReturn($mock);
        $mock->shouldReceive('getAuthIdentifierName')->once()->andReturn('id');
        $mock->shouldReceive('where')->once()->with('id', 1)->andReturn($mock);
        $mock->shouldReceive('first')->once()->andReturn(null);
        $provider->expects($this->once())->method('createModel')->willReturn($mock);
        $user = $provider->retrieveByToken(1, 'a');

        $this->assertNull($user);
    }

    public function testRetrieveByBadTokenReturnsNull()
    {
        $mockUser = m::mock(stdClass::class);
        $mockUser->shouldReceive('getRememberToken')->once()->andReturn(null);

        $provider = $this->getProviderMock();
        $mock = m::mock(stdClass::class);
        $mock->shouldReceive('newQuery')->once()->andReturn($mock);
        $mock->shouldReceive('getAuthIdentifierName')->once()->andReturn('id');
        $mock->shouldReceive('where')->once()->with('id', 1)->andReturn($mock);
        $mock->shouldReceive('first')->once()->andReturn($mockUser);
        $provider->expects($this->once())->method('createModel')->willReturn($mock);
        $user = $provider->retrieveByToken(1, 'a');

        $this->assertNull($user);
    }

    public function testRetrieveByCredentialsReturnsUser()
    {
        $provider = $this->getProviderMock();
        $mock = m::mock(stdClass::class);
        $mock->shouldReceive('newQuery')->once()->andReturn($mock);
        $mock->shouldReceive('where')->once()->with('username', 'dayle');
        $mock->shouldReceive('whereIn')->once()->with('group', ['one', 'two']);
        $mock->shouldReceive('first')->once()->andReturn('bar');
        $provider->expects($this->once())->method('createModel')->willReturn($mock);
        $user = $provider->retrieveByCredentials(['username' => 'dayle', 'password' => 'foo', 'group' => ['one', 'two']]);

        $this->assertSame('bar', $user);
    }

    public function testCredentialValidation()
    {
        $hasher = m::mock(Hasher::class);
        $hasher->shouldReceive('check')->once()->with('plain', 'hash')->andReturn(true);
        $provider = new EloquentUserProvider($hasher, 'foo');
        $user = m::mock(Authenticatable::class);
        $user->shouldReceive('getAuthPassword')->once()->andReturn('hash');
        $result = $provider->validateCredentials($user, ['password' => 'plain']);

        $this->assertTrue($result);
    }

    public function testModelsCanBeCreated()
    {
        $hasher = m::mock(Hasher::class);
        $provider = new EloquentUserProvider($hasher, EloquentProviderUserStub::class);
        $model = $provider->createModel();

        $this->assertInstanceOf(EloquentProviderUserStub::class, $model);
    }

    protected function getProviderMock()
    {
        $hasher = m::mock(Hasher::class);

        return $this->getMockBuilder(EloquentUserProvider::class)->setMethods(['createModel'])->setConstructorArgs([$hasher, 'foo'])->getMock();
    }
}

class EloquentProviderUserStub
{
    //
}
