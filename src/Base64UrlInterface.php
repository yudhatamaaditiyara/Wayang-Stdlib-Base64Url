<?php declare(strict_types=1);
/**
 * Copyright 2019 Yudha Tama Aditiyara
 * SPDX-License-Identifier: Apache-2.0
 */
namespace Wayang\Stdlib\Base64Url;

interface Base64UrlInterface
{
  /**
   * @param string $data
   * @return string
   */
  public function encode(string $data): string;

  /**
   * @param string $data
   * @return string
   */
  public function decode(string $data): string;

  /**
   * @param string $base64
   * @return string
   */
  public function convertBase64ToBase64Url(string $base64): string;

  /**
   * @param string $base64Url
   * @return string
   */
  public function convertBase64UrlToBase64(string $base64Url): string;

  /**
   * @param string $base64Url
   * @return string
   */
  public function appendPaddingToBase64Url(string $base64Url): string;
}