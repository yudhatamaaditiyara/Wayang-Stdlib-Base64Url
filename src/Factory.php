<?php declare(strict_types=1);
/**
 * Copyright 2019 Yudha Tama Aditiyara
 * SPDX-License-Identifier: Apache-2.0
 */
namespace Wayang\Stdlib\Base64Url;

abstract class Factory
{
  /**
   * @var Base64UrlInterface
   */
  protected static $base64Url;

  /**
   * @return Base64UrlInterface
   */
  public static function getBase64Url(): Base64UrlInterface{
    if (static::$base64Url === null) {
      static::$base64Url = new Base64Url();
    }
    return static::$base64Url;
  }

  /**
   * @param Base64UrlInterface $base64Url
   * @return null
   */
  public static function setBase64url(Base64UrlInterface $base64Url){
    static::$base64Url = $base64Url;
  }

  /**
   * @param string $data
   * @return string
   */
  public static function encode(string $data): string{
    return static::getBase64Url()->encode($data);
  }

  /**
   * @param string $data
   * @return string
   */
  public static function decode(string $data): string{
    return static::getBase64Url()->decode($data);
  }

  /**
   * @param string $base64
   * @return string
   */
  public static function convertBase64ToBase64Url(string $base64): string{
    return static::getBase64Url()->convertBase64ToBase64Url($base64);
  }

  /**
   * @param string $base64Url
   * @return string
   */
  public static function convertBase64UrlToBase64(string $base64Url): string{
    return static::getBase64Url()->convertBase64UrlToBase64($base64Url);
  }

  /**
   * @param string $base64Url
   * @return string
   */
  public static function appendPaddingToBase64Url(string $base64Url): string{
    return static::getBase64Url()->appendPaddingToBase64Url($base64Url);
  }
}