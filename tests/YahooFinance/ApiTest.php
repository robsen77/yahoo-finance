<?php
/**
 * Class ApiTest
 * @package Robsen77\Tests\YahooFinance
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */
/**
 * ApiTest.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

namespace Robsen77\Tests\YahooFinance;


use Robsen77\YahooFinance\Api;
use Robsen77\YahooFinance\Config\Config;

class ApiTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Api
     */
    private $api;

    public function setUp()
    {
        $config = new Config();
        $this->api = new Api($config);
    }

    public function testGetQuoteForYHOO()
    {
        $collection = $this->api->getQuotes("YHOO");
        $this->assertCount(1, $collection);
    }

    public function testGetQuoteForSeveralCompanies()
    {
        $collection = $this->api->getQuotes(["YHOO", "MS", "FB"]);
        $this->assertCount(3, $collection);
    }
}