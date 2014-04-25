<?php
/**
 * Class HttpClientFactoryTest
 * @package Robsen77\Tests\YahooFinance\Factory
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */
/**
 * HttpClientFactoryTest.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

namespace Robsen77\Tests\YahooFinance\Factory;

use Robsen77\YahooFinance\Config\Config;
use Robsen77\YahooFinance\Factory\HttpClientFactory;

class HttpClientFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var HttpClientFactory
     */
    private $factory;

    /**
     * @var Config
     */
    private $config;

    public function setUp()
    {
        /**
         * @var \Robsen77\YahooFinance\Config\Config
         */
        $this->config = $this->getMock('\\Robsen77\\YahooFinance\\Config\\Config', array('setHttClient'));
        $this->config->setHttpClient('\\Robsen77\\YahooFinance\\Http\\GuzzleClient');

        $this->factory = new HttpClientFactory($this->config);
    }

    /**
     * @expectedException \Robsen77\YahooFinance\Exception\HttpClientFactoryException
     */
    public function testGetInstanceWithNonExistentHttpClientClass()
    {
        $this->config->setHttpClient("");
        $this->factory = new HttpClientFactory($this->config);
        $this->factory->create();
    }

    /**
     * @expectedException \Robsen77\YahooFinance\Exception\HttpClientFactoryException
     */
    public function testGetInstanceWithInvalidHttpClientClass()
    {
        $this->config->setHttpClient("\\stdClass");
        $this->factory = new HttpClientFactory($this->config);
        $this->factory->create();
    }

    public function testGetInstanceReturnsRightInterface()
    {
        $instance = $this->factory->create();
        $this->assertInstanceOf('\\Robsen77\\YahooFinance\\Http\\ClientInterface', $instance);
    }
}
