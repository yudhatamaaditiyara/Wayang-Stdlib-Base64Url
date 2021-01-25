<?php declare(strict_types=1);
/**
 * Copyright 2019 Yudha Tama Aditiyara
 * SPDX-License-Identifier: Apache-2.0
 */
namespace WayangTest\Stdlib\Base64Url\Exception;

use ReflectionClass;
use RuntimeException;
use PHPUnit\Framework\TestCase;
use Wayang\Stdlib\Base64Url\Exception\Base64UrlException;
use Wayang\Stdlib\Base64Url\Exception\ExceptionInterface;

class Base64UrlExceptionTest extends TestCase
{
  public function testMustBeClass(){
    $rc = new ReflectionClass(Base64UrlException::class);
    $this->assertFalse($rc->isTrait());
    $this->assertFalse($rc->isInterface());
  }

  public function testMustBeSubclassOfRuntimeException(){
    $rc = new ReflectionClass(Base64UrlException::class);
    $this->assertTrue($rc->isSubclassOf(RuntimeException::class));
  }

  public function testMustBeImplemetsExceptionInterface(){
    $rc = new ReflectionClass(Base64UrlException::class);
    $this->assertTrue($rc->implementsInterface(ExceptionInterface::class));
  }
}