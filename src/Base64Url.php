<?php declare(strict_types=1);
/**
 * Copyright 2019 Yudha Tama Aditiyara
 * SPDX-License-Identifier: Apache-2.0
 */
namespace Wayang\Stdlib\Base64Url;

/**
 * https://tools.ietf.org/html/rfc7515#appendix-C
 */
class Base64Url implements Base64UrlInterface
{
  /**
   * @param string $data
   * @return string
   */
  public function encode(string $data): string{
    $data = $this->convertBase64ToBase64Url(base64_encode($data));
    return $data;
  }

  /**
   * @param string $data
   * @throws Exception\Base64UrlException
   * @return string
   */
  public function decode(string $data): string{
    $data = base64_decode($this->convertBase64UrlToBase64($data), true);
    if ($data === false) {
      throw new Exception\Base64UrlException('Invalid data');
    }
    return $data;
  }

  /**
   * @param string $base64
   * @return string
   */
  public function convertBase64ToBase64Url(string $base64): string{
    $base64Url = rtrim($base64, '=');
    $base64Url = strtr($base64Url, '+/', '-_');
    return $base64Url;
  }

  /**
   * @param string $base64Url
   * @return string
   */
  public function convertBase64UrlToBase64(string $base64Url): string{
    $base64 = $this->appendPaddingToBase64Url($base64Url);
    $base64 = strtr($base64, '-_', '+/');
    return $base64;
  }

  /**
   * @param string $base64Url
   * @throws Exception\Base64UrlException
   * @return string
   */
  public function appendPaddingToBase64Url(string $base64Url): string{
    $padding = strlen($base64Url) % 4;
    switch ($padding) {
      case 3:
        return $base64Url . '=';
      case 2:
        return $base64Url . '==';
      case 1:
        throw new Exception\Base64UrlException('Invalid base64Url string');
    }
    return $base64Url;
  }
}