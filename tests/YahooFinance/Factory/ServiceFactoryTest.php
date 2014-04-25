<?php
/**
 * Class ServiceFactoryTest
 * @package Robsen77\Tests\YahooFinance\Factory
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */
/**
 * ServiceFactoryTest.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

namespace Robsen77\Tests\YahooFinance\Factory;

use Robsen77\YahooFinance\Factory\ServiceFactory;
use Robsen77\YahooFinance\Factory\ServiceFactoryMethod;

class ServiceFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ServiceFactoryMethod
     */
    private $factory;

    public function setUp()
    {
        $httpClient = $this->getMock('\\Robsen77\\YahooFinance\\Http\\ClientInterface');
        $this->factory = new ServiceFactory($httpClient);
    }

    public function testGetQuoteServiceReturnsQuoteService()
    {
        $service = $this->factory->create(ServiceFactory::QUOTE);
        $this->assertInstanceOf('\\Robsen77\\YahooFinance\\Service\\Quote', $service);
    }

    /**
     * @expectedException \Robsen77\YahooFinance\Exception\ServiceFactoryException
     */
    public function testGetUnknownServiceThrowsException()
    {
        $service = $this->factory->create("unknown service");
    }
}
