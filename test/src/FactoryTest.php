<?php declare(strict_types=1);
/**
 * Copyright 2019 Yudha Tama Aditiyara
 * SPDX-License-Identifier: Apache-2.0
 */
namespace WayangTest\Stdlib\Base64Url;

use ReflectionClass;
use PHPUnit\Framework\TestCase;
use Wayang\Stdlib\Base64Url\Factory;
use Wayang\Stdlib\Base64Url\Base64Url;
use Wayang\Stdlib\Base64Url\Base64UrlInterface;

class FactoryTest extends TestCase
{
  public function testMustBeClass(){
    $rc = new ReflectionClass(Factory::class);
    $this->assertFalse($rc->isTrait());
    $this->assertFalse($rc->isInterface());
  }

  public function testMustBeAbstractClass(){
    $rc = new ReflectionClass(Factory::class);
    $this->assertTrue($rc->isAbstract());
  }

  public function testGetBase64Url(){
    $base64Url = Factory::getBase64Url();
    $this->assertInstanceOf(Base64UrlInterface::class, $base64Url);
  }

  public function testSetBase64Url(){
    $base64Url = new Base64Url();
    $this->assertEquals(Factory::setBase64url($base64Url), null);
    $this->assertEquals(Factory::getBase64Url(), $base64Url);
  }

  public function testEncode(){
    $this->assertEquals(Factory::encode(Base64UrlTest::DECODED_DATA), Base64UrlTest::ENCODED_DATA);
  }

  public function testDecode(){
    $this->assertEquals(Factory::decode(Base64UrlTest::ENCODED_DATA), Base64UrlTest::DECODED_DATA);
  }

  public function testConvertBase64ToBase64Url(){
    $base64 = base64_encode(Base64UrlTest::DECODED_DATA);
    $this->assertEquals(Factory::convertBase64ToBase64Url($base64), Base64UrlTest::ENCODED_DATA);
  }

  public function testConvertBase64UrlToBase64(){
    $base64 = base64_encode(Base64UrlTest::DECODED_DATA);
    $this->assertEquals(Factory::convertBase64UrlToBase64(Base64UrlTest::ENCODED_DATA), $base64);
  }

  public function testAppendPaddingToBase64Url(){
    $this->assertEquals(Factory::appendPaddingToBase64Url(str_repeat('_', 2)), '__==');
    $this->assertEquals(Factory::appendPaddingToBase64Url(str_repeat('_', 3)), '___=');
    $this->assertEquals(Factory::appendPaddingToBase64Url(str_repeat('_', 4)), '____');
  }
}