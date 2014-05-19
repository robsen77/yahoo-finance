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
use Robsen77\YahooFinance\Api\TimeSeriesQuote;
use Robsen77\YahooFinance\Config\Config;
use Robsen77\YahooFinance\Factory\HttpClientFactory as HttpClientFactory;
use Robsen77\YahooFinance\Factory\ServiceFactory;
use Robsen77\YahooFinance\Factory\ServiceFactoryMethod;

class Api
{
    /**
     * Quote api trait
     */
    use Quote;

    /**
     * TimeSeriesQuote api trait
     */
    use TimeSeriesQuote;

    /**
     * @var ServiceFactoryMethod
     */
    private $serviceFactory;

    /**
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->initServiceFactory($config);
    }

    protected function getHttpClient(Config $config)
    {
        $httpClientFactory = new HttpClientFactory($config);
        return $httpClientFactory->create();
    }

    /**
     * initializes the service factory
     */
    private function initServiceFactory(Config $config)
    {
        $this->serviceFactory = new ServiceFactory($this->getHttpClient($config));
    }
}
