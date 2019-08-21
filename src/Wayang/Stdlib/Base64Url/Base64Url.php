<?php
/**
 * Copyright (C) 2019 Yudha Tama Aditiyara
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
namespace Wayang\Stdlib\Base64Url;

use Wayang\Exception\Spl\RuntimeException;

/**
 */
class Base64Url implements Base64UrlInterface
{
	/**
	 * @param string $data
	 * @return string
	 */
	public function encode(string $data): string{
		return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
	}

	/**
	 * @param string $data
	 * @throws RuntimeException
	 * @return string
	 */
	public function decode(string $data): string{
		if ($pad = strlen($data) % 4) {
			$data .= str_repeat('=', 4 - $pad);
		}
		$data = base64_decode(strtr($data, '-_', '+/'), true);
		if ($data === false) {
			throw new RuntimeException('Invalid data');
		}
		return $data;
	}
}