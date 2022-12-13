<?php
/**
 * @noinspection PhpDocMissingThrowsInspection
 */
declare(strict_types=1);

namespace Taxionus\ResponseBuilder\Tests\BaseApiCodes;

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
use Taxionus\ResponseBuilder\Exceptions as Ex;
use Taxionus\ResponseBuilder\ResponseBuilder as RB;
use Taxionus\ResponseBuilder\Tests\TestCase;

/**
 * Class BaseApiCodesTest
 *
 * @package Taxionus\ResponseBuilder\Tests
 */
class BaseApiCodesTest extends TestCase
{
    /**
     * Tests getMinCode() with invalid config
     *
     * @return void
     */
    public function testGetMinCodeMissingConfigKey(): void
    {
        $this->expectException(Ex\MissingConfigurationKeyException::class);

        /** @noinspection PhpUndefinedClassInspection */
        \Config::offsetUnset(RB::CONF_KEY_MIN_CODE);
	    /** @noinspection PhpUnhandledExceptionInspection */
	    BaseApiCodes::getMinCode();
    }

    /**
     * Tests getMaxCode() with invalid config
     *
     * @return void
     */
    public function testGetMaxCodeMissingConfigKey(): void
    {
        $this->expectException(Ex\MissingConfigurationKeyException::class);

        /** @noinspection PhpUndefinedClassInspection */
        \Config::offsetUnset(RB::CONF_KEY_MAX_CODE);
	    /** @noinspection PhpUnhandledExceptionInspection */
        BaseApiCodes::getMaxCode();
    }

    /**
     * Tests getMap() with missing config
     *
     * @return void
     */
    public function testGetMapMissingConfigKey(): void
    {
        $this->expectException(Ex\MissingConfigurationKeyException::class);

        /** @noinspection PhpUndefinedClassInspection */
        \Config::offsetUnset(RB::CONF_KEY_MAP);
	    /** @noinspection PhpUnhandledExceptionInspection */
        BaseApiCodes::getMap();
    }

    /**
     * Tests getMap() with wrong config
     *
     * @return void
     */
    public function testGetMapWrongConfig(): void
    {
        $this->expectException(Ex\InvalidTypeException::class);

        /** @noinspection PhpUndefinedClassInspection */
        \Config::set(RB::CONF_KEY_MAP, false);
	    /** @noinspection PhpUnhandledExceptionInspection */
        BaseApiCodes::getMap();
    }
}
