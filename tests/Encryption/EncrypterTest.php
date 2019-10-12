<?php

namespace Illuminate\Tests\Encryption;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Encryption\Encrypter;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class EncrypterTest extends TestCase
{
    public function testEncryption()
    {
        $e = new Encrypter(str_repeat('a', 16));
        $encrypted = $e->encrypt('foo');
        $this->assertNotSame('foo', $encrypted);
        $this->assertSame('foo', $e->decrypt($encrypted));
    }

    public function testRawStringEncryption()
    {
        $e = new Encrypter(str_repeat('a', 16));
        $encrypted = $e->encryptString('foo');
        $this->assertNotSame('foo', $encrypted);
        $this->assertSame('foo', $e->decryptString($encrypted));
    }

    public function testEncryptionUsingBase64EncodedKey()
    {
        $e = new Encrypter(random_bytes(16));
        $encrypted = $e->encrypt('foo');
        $this->assertNotSame('foo', $encrypted);
        $this->assertSame('foo', $e->decrypt($encrypted));
    }

    public function testWithCustomCipher()
    {
        $e = new Encrypter(str_repeat('b', 32), 'AES-256-CBC');
        $encrypted = $e->encrypt('bar');
        $this->assertNotSame('bar', $encrypted);
        $this->assertSame('bar', $e->decrypt($encrypted));

        $e = new Encrypter(random_bytes(32), 'AES-256-CBC');
        $encrypted = $e->encrypt('foo');
        $this->assertNotSame('foo', $encrypted);
        $this->assertSame('foo', $e->decrypt($encrypted));
    }

    public function testDoNoAllowLongerKey()
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('The only supported ciphers are AES-128-CBC and AES-256-CBC with the correct key lengths.');

        new Encrypter(str_repeat('z', 32));
    }

    public function testWithBadKeyLength()
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('The only supported ciphers are AES-128-CBC and AES-256-CBC with the correct key lengths.');

        new Encrypter(str_repeat('a', 5));
    }

    public function testWithBadKeyLengthAlternativeCipher()
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('The only supported ciphers are AES-128-CBC and AES-256-CBC with the correct key lengths.');

        new Encrypter(str_repeat('a', 16), 'AES-256-CFB8');
    }

    public function testWithUnsupportedCipher()
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('The only supported ciphers are AES-128-CBC and AES-256-CBC with the correct key lengths.');

        new Encrypter(str_repeat('c', 16), 'AES-256-CFB8');
    }

    public function testExceptionThrownWhenPayloadIsInvalid()
    {
        $this->expectException(DecryptException::class);
        $this->expectExceptionMessage('The payload is invalid.');

        $e = new Encrypter(str_repeat('a', 16));
        $payload = $e->encrypt('foo');
        $payload = str_shuffle($payload);
        $e->decrypt($payload);
    }

    public function testExceptionThrownWithDifferentKey()
    {
        $this->expectException(DecryptException::class);
        $this->expectExceptionMessage('The MAC is invalid.');

        $a = new Encrypter(str_repeat('a', 16));
        $b = new Encrypter(str_repeat('b', 16));
        $b->decrypt($a->encrypt('baz'));
    }

    public function testExceptionThrownWhenIvIsTooLong()
    {
        $this->expectException(DecryptException::class);
        $this->expectExceptionMessage('The payload is invalid.');

        $e = new Encrypter(str_repeat('a', 16));
        $payload = $e->encrypt('foo');
        $data = json_decode(base64_decode($payload), true);
        $data['iv'] .= $data['value'][0];
        $data['value'] = substr($data['value'], 1);
        $modified_payload = base64_encode(json_encode($data));
        $e->decrypt($modified_payload);
    }
}
