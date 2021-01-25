<?php declare(strict_types=1);
/**
 * Copyright 2019 Yudha Tama Aditiyara
 * SPDX-License-Identifier: Apache-2.0
 */
namespace WayangTest\Stdlib\Base64Url;

use ReflectionClass;
use PHPUnit\Framework\TestCase;
use Wayang\Stdlib\Base64Url\Base64UrlInterface;

class Base64UrlInterfaceTest extends TestCase
{
  public function testMustBeInterface(){
    $rc = new ReflectionClass(Base64UrlInterface::class);
    $this->assertTrue($rc->isInterface());
  }
}