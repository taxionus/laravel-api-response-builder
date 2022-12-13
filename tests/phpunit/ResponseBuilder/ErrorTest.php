<?php
/**
 * @noinspection PhpUnhandledExceptionInspection
 * @noinspection PhpDocMissingThrowsInspection
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

use Taxionus\ResponseBuilder\ResponseBuilder as RB;
use Taxionus\ResponseBuilder\Tests\TestCase;

/**
 * Class ErrorTest
 *
 * @package Taxionus\ResponseBuilder\Tests
 */
class ErrorTest extends TestCase
{
	/**
	 * Check success()
	 *
	 * @return void
	 */
    public function testError(): void
    {
        // GIVEN random error code
        $api_code = $this->random_api_code;

        // WHEN we report error
        $this->response = RB::error($api_code);

        // THEN returned message contains given error code and mapped message
        $j = $this->getResponseErrorObject($api_code);
        $this->assertEquals($this->random_api_code_message, $j->message);

        // AND no data
        $this->assertNull($j->data);
    }

}
