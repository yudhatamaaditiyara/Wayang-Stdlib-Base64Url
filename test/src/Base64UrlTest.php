<?php declare(strict_types=1);
/**
 * Copyright 2019 Yudha Tama Aditiyara
 * SPDX-License-Identifier: Apache-2.0
 */
namespace WayangTest\Stdlib\Base64Url;

use Throwable;
use ReflectionClass;
use PHPUnit\Framework\TestCase;
use Wayang\Stdlib\Base64Url\Base64Url;
use Wayang\Stdlib\Base64Url\Base64UrlInterface;
use Wayang\Stdlib\Base64Url\Exception\Base64UrlException;

class Base64UrlTest extends TestCase
{
  const ENCODED_DATA = 'SXIuU29la2Fybm8gLSBMZWFybmluZyB3aXRob3V0IHRoaW5raW5nIGlzIHVzZWxlc3MsIGJ1dCB0aGlua2luZyB3aXRob3V0IGxlYXJuaW5nIGlzIHZlcnkgZGFuZ2Vyb3VzIQ';
  const DECODED_DATA = 'Ir.Soekarno - Learning without thinking is useless, but thinking without learning is very dangerous!';
  const INVALID_STRING_BASE64_URL = "abcde*";
  const INVALID_PADDING_BASE64_URL = 'abcde';

  public function testMustBeClass(){
    $rc = new ReflectionClass(Base64Url::class);
    $this->assertFalse($rc->isTrait());
    $this->assertFalse($rc->isInterface());
  }

  public function testMustBeImplemetsBase64UrlInterface(){
    $rc = new ReflectionClass(Base64Url::class);
    $this->assertTrue($rc->implementsInterface(Base64UrlInterface::class));
  }

  public function testEncode(){
    $base64Url = new Base64Url();
    $this->assertEquals($base64Url->encode(static::DECODED_DATA), static::ENCODED_DATA);
  }

  public function testDecode(){
    $base64Url = new Base64Url();
    $this->assertEquals($base64Url->decode(static::ENCODED_DATA), static::DECODED_DATA);
  }

  public function testConvertBase64ToBase64Url(){
    $base64Url = new Base64Url();
    $base64 = base64_encode(static::DECODED_DATA);
    $this->assertEquals($base64Url->convertBase64ToBase64Url($base64), static::ENCODED_DATA);
  }

  public function testConvertBase64UrlToBase64(){
    $base64Url = new Base64Url();
    $base64 = base64_encode(static::DECODED_DATA);
    $this->assertEquals($base64Url->convertBase64UrlToBase64(static::ENCODED_DATA), $base64);
  }

  public function testAppendPaddingToBase64Url(){
    $base64Url = new Base64Url();
    $this->assertEquals($base64Url->appendPaddingToBase64Url(str_repeat('_', 2)), '__==');
    $this->assertEquals($base64Url->appendPaddingToBase64Url(str_repeat('_', 3)), '___=');
    $this->assertEquals($base64Url->appendPaddingToBase64Url(str_repeat('_', 4)), '____');
    $this->assertEquals($base64Url->appendPaddingToBase64Url(str_repeat('_', 6)), '______==');
    $this->assertEquals($base64Url->appendPaddingToBase64Url(str_repeat('_', 7)), '_______=');
    $this->assertEquals($base64Url->appendPaddingToBase64Url(str_repeat('_', 8)), '________');
  }

  public function testInvalidStringBase64Url(){
    $base64Url = new Base64Url();
    try {
      $base64Url->decode(static::INVALID_STRING_BASE64_URL);
    } catch (Throwable $e) {
      $this->assertInstanceOf(Base64UrlException::class, $e);
      return;
    }
    $this->assertTrue(false);
  }

  public function testInvalidPaddingBase64Url(){
    $base64Url = new Base64Url();
    try {
      $base64Url->decode(static::INVALID_PADDING_BASE64_URL);
    } catch (Throwable $e) {
      $this->assertInstanceOf(Base64UrlException::class, $e);
      return;
    }
    $this->assertTrue(false);
  }
}