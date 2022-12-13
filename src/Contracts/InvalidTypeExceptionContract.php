<?php
declare(strict_types=1);

namespace Taxionus\ResponseBuilder\Contracts;

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
interface InvalidTypeExceptionContract
{
	public function __construct(string $var_name, string $type, array $allowed_types);
}
