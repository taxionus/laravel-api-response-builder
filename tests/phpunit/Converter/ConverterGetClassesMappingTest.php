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
use Taxionus\ResponseBuilder\Exceptions as Ex;
use Taxionus\ResponseBuilder\ResponseBuilder as RB;
use Taxionus\ResponseBuilder\Tests\TestCase;

/**
 * Class ConverterGetClassesMappingTest
 *
 * @package Taxionus\ResponseBuilder\Tests
 */
class ConverterGetClassesMappingTest extends TestCase
{
	/**
	 * Checks if getClassesMapping would throw exception on invalid configuration data
	 */
	public function testInvalidConfigurationData(): void
	{
		Config::set(RB::CONF_KEY_CONVERTER_CLASSES, 'invalid');

		$this->expectException(Ex\InvalidConfigurationException::class);

		$this->callProtectedMethod(Converter::class, 'getClassesMapping');
	}

	/**
	 * Checks if getClassesMapping would return empty array if there's no "classes" config entry
	 */
	public function testNoMappingConfig(): void
	{
		// Remove any classes config
		/** @noinspection PhpUndefinedMethodInspection */
		Config::offsetUnset(RB::CONF_KEY_CONVERTER_CLASSES);

		$result = $this->callProtectedMethod(Converter::class, 'getClassesMapping');
		$this->assertIsArray($result);
		$this->assertEmpty($result);
	}

}
