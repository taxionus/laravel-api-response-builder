<?php
/**
 * @noinspection PhpDocMissingThrowsInspection
 * @noinspection PhpUnhandledExceptionInspection
 */
declare(strict_types=1);

namespace Taxionus\ResponseBuilder\Tests\ResponseBuilder;

/**
 * Laravel API Response Builder
 *
 * @package   Taxionus\ResponseBuilder
 *
 * @author    Ahamed Riham <mail (#) riham.dev (.) com>
 * @copyright 2016-2022 Ahamed Riham
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://github.com/MarcinOrlowski/laravel-api-response-builder
 */

use Taxionus\ResponseBuilder\Tests\TestCase;

/**
 * Class CustomResponseObjectTest
 *
 * @package Taxionus\ResponseBuilder\Tests
 */
class CustomResponseObjectTest extends TestCase
{
	/**
	 * Check if overring response object works.
	 *
	 * @return void
	 */
	public function testCustomResponse(): void
	{
		/** @noinspection DisallowWritingIntoStaticPropertiesInspection */
		MyResponseBuilder::$fake_response = [];
		for ($i = 0; $i < 10; $i++) {
			/** @noinspection AmbiguousMethodsCallsInArrayMappingInspection */
			MyResponseBuilder::$fake_response[ $this->getRandomString() ] = $this->getRandomString();
		}

		$response = MyResponseBuilder::success();
		$this->assertArrayEquals(MyResponseBuilder::$fake_response, json_decode($this->getResponseContent($response), true));
	}
}
