<?php
/**
 * @noinspection PhpDocMissingThrowsInspection
 * @noinspection PhpUnhandledExceptionInspection
 */
declare(strict_types=1);

namespace Taxionus\ResponseBuilder\Tests\Converter;

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

use Illuminate\Support\Facades\Config;
use Taxionus\ResponseBuilder\Converter;
use Taxionus\ResponseBuilder\Converters\ToArrayConverter;
use Taxionus\ResponseBuilder\Exceptions as Ex;
use Taxionus\ResponseBuilder\ResponseBuilder as RB;
use Taxionus\ResponseBuilder\Tests\Models\TestModel;
use Taxionus\ResponseBuilder\Tests\Models\TestModelChild;
use Taxionus\ResponseBuilder\Tests\TestCase;

/**
 * Class ConverterTest
 *
 * @package Taxionus\ResponseBuilder\Tests
 */
class ConverterTest extends TestCase
{
	/**
	 * Checks if Converter's constructor would throw exception when configuration is invalid.
	 */
	public function testConstructor(): void
	{
		// GIVEN incorrect mapping configuration
		Config::set(RB::CONF_KEY_CONVERTER_CLASSES, false);

		// THEN we expect exception thrown
		$this->expectException(Ex\InvalidConfigurationException::class);

		// WHEN attempt to instantiate Converter class
		new Converter();
	}

	/**
	 * Checks if object of child class will be properly converted when
	 * configuration mapping exists for its parent class only.
	 */
	public function testSubclassOfConfiguredClassConversion(): void
	{
		// GIVEN two objects with direct inheritance relation
		$parent_val = $this->getRandomString('parent');
		$parent = new TestModel($parent_val);
		$child_val = $this->getRandomString('child');
		$child = new TestModelChild($child_val);

		// HAVING indirect mapping configuration (of parent class)
		$key = $this->getRandomString('key');
		Config::set(RB::CONF_KEY_CONVERTER_CLASSES, [
			\get_class($parent) => [
				RB::KEY_HANDLER => ToArrayConverter::class,
				RB::KEY_KEY => $key,
			],
		]);

		// WHEN we try to pass of child class
		$result = (new Converter())->convert($child);

		// EXPECT it to be converted as per parent class configuration entry
		$this->assertIsArray($result);
		/** @var array $result */
		$this->assertArrayHasKey($key, $result);
		$result = $result[$key];
		$this->assertCount(1, $result);
		$this->assertEquals($child_val, $result[TestModel::FIELD_NAME]);
	}
}
