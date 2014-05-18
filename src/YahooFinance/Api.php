<?php
/**
 * Api.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

/**
 * Class Api
 *
 * @package Robsen77\YahooFinance
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

namespace Robsen77\YahooFinance;


use Robsen77\YahooFinance\Api\Quote;
use Robsen77\YahooFinance\Config\Config;
use Robsen77\YahooFinance\Factory\HttpClientFactory as HttpClientFactory;
use Robsen77\YahooFinance\Factory\ServiceFactory;
use Robsen77\YahooFinance\Factory\ServiceFactoryMethod;
use Robsen77\YahooFinance\Http\ClientInterface;

class Api
{
    /**
     * quote api trait
     */
    use Quote;

    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * @var ServiceFactoryMethod
     */
    private $serviceFactory;

    /**
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->initHttpClient($config);
        $this->initServiceFactory();
    }

    /**
     * initializes the http client
     * @param Config $config
     */
    private function initHttpClient(Config $config)
    {
        $httpClientFactory = new HttpClientFactory($config);
        $this->httpClient = $httpClientFactory->create();
    }

    /**
     * initializes the service factory
     */
    private function initServiceFactory()
    {
        $this->serviceFactory = new ServiceFactory($this->httpClient);
    }
}
