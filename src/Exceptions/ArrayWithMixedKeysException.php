<?php
declare(strict_types=1);

namespace Taxionus\ResponseBuilder\Exceptions;

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
final class ArrayWithMixedKeysException extends \Exception
{
	/** @var string */
	protected $message =
		'Invalid data array. Either set own keys for all the items or do not specify any keys at all. ' .
		'Arrays with mixed keys are not supported by design.';
}
