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

use Illuminate\Support\Facades\Config;
use Taxionus\ResponseBuilder\BaseApiCodes;
use Taxionus\ResponseBuilder\ResponseBuilder as RB;
use Taxionus\ResponseBuilder\Type;
use Taxionus\ResponseBuilder\Tests\TestCase;

/**
 * Class SuccessTest
 *
 * @package Taxionus\ResponseBuilder\Tests
 */
class SuccessTest extends TestCase
{
	/**
	 * Check plain success() invocation
	 *
	 * @return void
	 */
	public function testSuccess(): void
	{
		$this->response = RB::success();
		$j = $this->getResponseSuccessObject(BaseApiCodes::OK());

		$this->assertNull($j->data);
		$msg_key = BaseApiCodes::getCodeMessageKey(BaseApiCodes::OK());
		/** @var string $msg_key */
		$this->assertEquals($this->langGet($msg_key), $j->message);
	}

	public function testSuccessWithArrayPayload(): void
	{
		$payload = [];
		for ($i = 0; $i < 10; $i++) {
			$payload[] = $this->getRandomString("item${i}");
		}

		$this->response = RB::success($payload);
		$j = $this->getResponseSuccessObject(BaseApiCodes::OK());

		$this->assertNotNull($j->data);
		$data = (array)$j->data;

		$cfg = Config::get(RB::CONF_KEY_CONVERTER_PRIMITIVES);
		$this->assertNotEmpty($cfg);
		$key = $cfg[ Type::ARRAY ][ RB::KEY_KEY ];

		$this->assertCount(1, $data);
		$this->assertArrayEquals($payload, (array)$j->data->{$key});

		$msg_key = BaseApiCodes::getCodeMessageKey(BaseApiCodes::OK());
		/** @var string $msg_key */
		$this->assertEquals($this->langGet($msg_key), $j->message);
	}

}
