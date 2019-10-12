<?php

namespace Illuminate\Tests\Integration\Cache;

use Illuminate\Support\Facades\Cache;

/**
 * @group integration
 */
class MemcachedTaggedCacheTest extends MemcachedIntegrationTest
{
    public function testMemcachedCanStoreAndRetrieveTaggedCacheItems()
    {
        $store = Cache::store('memcached');

        $store->tags(['people', 'artists'])->put('John', 'foo', 1);
        $store->tags(['people', 'authors'])->put('Anne', 'bar', 1);

        $this->assertSame('foo', $store->tags(['people', 'artists'])->get('John'));
        $this->assertSame('bar', $store->tags(['people', 'authors'])->get('Anne'));

        $store->tags(['people', 'artists'])->put('John', 'baz');
        $store->tags(['people', 'authors'])->put('Anne', 'qux');

        $this->assertSame('baz', $store->tags(['people', 'artists'])->get('John'));
        $this->assertSame('qux', $store->tags(['people', 'authors'])->get('Anne'));

        $store->tags('authors')->flush();
        $this->assertNull($store->tags(['people', 'authors'])->get('Anne'));

        $store->tags(['people', 'authors'])->flush();
        $this->assertNull($store->tags(['people', 'artists'])->get('John'));
    }

    public function testMemcachedCanStoreManyTaggedCacheItems()
    {
        $store = Cache::store('memcached');

        $store->tags(['people', 'artists'])->putMany(['John' => 'foo', 'Jane' => 'bar'], 1);

        $this->assertSame('foo', $store->tags(['people', 'artists'])->get('John'));
        $this->assertSame('bar', $store->tags(['people', 'artists'])->get('Jane'));

        $store->tags(['people', 'artists'])->putMany(['John' => 'baz', 'Jane' => 'qux']);

        $this->assertSame('baz', $store->tags(['people', 'artists'])->get('John'));
        $this->assertSame('qux', $store->tags(['people', 'artists'])->get('Jane'));

        $store->tags(['people', 'artists'])->putMany(['John' => 'baz', 'Jane' => 'qux'], -1);

        $this->assertNull($store->tags(['people', 'artists'])->get('John'));
        $this->assertNull($store->tags(['people', 'artists'])->get('Jane'));
    }
}
