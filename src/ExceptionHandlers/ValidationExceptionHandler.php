<?php
declare(strict_types=1);

namespace Taxionus\ResponseBuilder\ExceptionHandlers;

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
use Taxionus\ResponseBuilder\Contracts\ExceptionHandlerContract;
use Taxionus\ResponseBuilder\ResponseBuilder as RB;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

/**
 * Handles ValidationException
 */
final class ValidationExceptionHandler implements ExceptionHandlerContract
{
	/**
	 * @param array      $user_config
	 * @param \Throwable $ex
	 *
	 * @return array|null
	 * @throws \Taxionus\ResponseBuilder\Exceptions\InvalidTypeException
	 * @throws \Taxionus\ResponseBuilder\Exceptions\MissingConfigurationKeyException
	 * @throws \Taxionus\ResponseBuilder\Exceptions\NotIntegerException
	 *
	 * phpcs:disable Generic.CodeAnalysis.UnusedFunctionParameter.FoundInImplementedInterfaceAfterLastUsed
	 */
	public function handle(array $user_config, \Throwable $ex): ?array
	{
		/** @noinspection PhpUnhandledExceptionInspection */
		return [
			RB::KEY_API_CODE  => BaseApiCodes::EX_VALIDATION_EXCEPTION(),
			RB::KEY_HTTP_CODE => HttpResponse::HTTP_UNPROCESSABLE_ENTITY,
		];
	}
}
