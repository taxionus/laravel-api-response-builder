<?php
declare(strict_types=1);

namespace Taxionus\ResponseBuilder\Tests\Models;

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

/**
 * Class TestModel to verify auto-conversion feature
 */
class TestModel
{
	/** @var string Name of $val attribute, referenced by tests to avoid hardcoding */
	public const FIELD_NAME = 'val';

	/** @var string|null */
	protected $val;

	/**
	 * TestModel constructor.
	 *
	 * @param string $val
	 */
	public function __construct(string $val)
	{
		$this->val = $val;
	}

	/**
	 * @return string|null
	 */
	public function getVal(): ?string
	{
		return $this->val;
	}

	/**
	 * Converts model to array
	 *
	 * @return array
	 */
	public function toArray(): array
	{
		return [
			self::FIELD_NAME => $this->val,
		];
	}
}
