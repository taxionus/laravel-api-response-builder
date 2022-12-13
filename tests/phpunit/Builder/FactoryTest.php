<?php
/**
 * @noinspection PhpUnhandledExceptionInspection
 * @noinspection PhpDocMissingThrowsInspection
 */
declare(strict_types=1);

namespace Taxionus\ResponseBuilder\Tests\Builder;

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

use Taxionus\ResponseBuilder\BaseApiCodes;
use Taxionus\ResponseBuilder\Tests\TestCase;

/**
 * Class FactoryTest
 *
 * @package Taxionus\ResponseBuilder\Tests
 */
class FactoryTest extends TestCase
{
	/**
	 * Checks if asSuccess() properly returns object of extending class
	 *
	 * @return void
	 */
	public function testAsSuccess(): void
	{
		$dummy_rb = DummyResponseBuilder::asSuccess();
		$this->assertEquals(DummyResponseBuilder::class, \get_class($dummy_rb));
	}

	/**
	 * Checks if asError(); properly returns object of extending class
	 *
	 * @return void
	 */
	public function testAsError(): void
	{
		$dummy_rb = DummyResponseBuilder::asError(BaseApiCodes::NO_ERROR_MESSAGE());
		$this->assertEquals(DummyResponseBuilder::class, \get_class($dummy_rb));
	}
}
