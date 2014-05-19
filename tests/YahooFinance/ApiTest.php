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

    public function testGetQuoteForYHOO()
    {
        $fixture = $this->getFixture("yhoo.quotes.txt");
        $this->createMockedApi($fixture);
        $collection = $this->api->getQuotes("YHOO");
        $this->assertCount(1, $collection);
    }

    public function testGetQuoteForSeveralCompanies()
    {
        $fixture = $this->getFixture("yhoo_ms_fb.quotes.txt");
        $this->createMockedApi($fixture);
        $collection = $this->api->getQuotes(["YHOO", "MS", "FB"]);
        $this->assertCount(3, $collection);
    }

    public function testGetTimeSeriesQuoteForSingleCompany()
    {
        $fixture = $this->getFixture("yhoo.timeseries.txt");
        $this->createMockedApi($fixture);
        $collection = $this->api->getTimeSeriesQuotes("YHOO", "2010-01-01", "2010-01-31");
        $this->assertCount(19, $collection);
    }

    public function testGetTimeSeriesQuoteForSeveralCompanies()
    {
        $fixture = $this->getFixture("yhoo_ms_aapl.timeseries.txt");
        $this->createMockedApi($fixture);
        $collection = $this->api->getTimeSeriesQuotes(["YHOO", "MS", "AAPL"], "2010-01-01", "2010-01-31");
        $this->assertCount(19 * 3, $collection);
    }

    private function getFixture($file)
    {
        return file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'fixtures' . DIRECTORY_SEPARATOR . $file);
    }

    private function createMockedApi($fixture)
    {
        $config = new Config();

        $httpClient = $this->getMock("Robsen77\\YahooFinance\\Http\\ClientInterface", ["getQueryResult"]);
        $httpClient->expects($this->exactly(1))
            ->method("getQueryResult")
            ->with($this->anything())
            ->will($this->returnValue($fixture));

        $api = $this->getMock("Robsen77\\YahooFinance\\Api", ["getHttpClient"], [], '', false);
        $api->expects($this->exactly(1))
            ->method("getHttpClient")
            ->with($config)
            ->will($this->returnValue($httpClient));

        $api->__construct($config);

        $this->api = $api;
    }
}
