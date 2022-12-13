<?php
declare(strict_types=1);

namespace Taxionus\ResponseBuilder\Tests\Converter\Converters;

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

use Taxionus\ResponseBuilder\Contracts\ConverterContract;

/**
 * Class FakeConverter
 *
 * @package Taxionus\ResponseBuilder\Tests\Converters
 */
class FakeConverter implements ConverterContract
{
	/** @var string */
	public $key = 'fake';
	/** @var string */
	public $val = 'converter';

	/**
	 * Simulates object conversion.
	 *
	 * @param object $obj
	 * @param array  $config
	 *
	 * @return string[]
	 *
	 * phpcs:disable Generic.CodeAnalysis.UnusedFunctionParameter.FoundInImplementedInterfaceAfterLastUsed
	 */
	public function convert(object $obj, array $config): array
	{
		return [$this->key => $this->val];
	}
}
