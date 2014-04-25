<?php
/**
 * Service.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

/**
 * Class Service
 *
 * @package Robsen77\YahooFinance
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

namespace Robsen77\YahooFinance;


use Robsen77\YahooFinance\Config\Config;
use Robsen77\YahooFinance\Entity\Quote;
use Robsen77\YahooFinance\Factory\HttpClientFactory as HttpClientFactory;
use Robsen77\YahooFinance\Factory\ServiceFactory;
use Robsen77\YahooFinance\Factory\ServiceFactoryMethod;
use Robsen77\YahooFinance\Http\ClientInterface;
use Robsen77\YahooFinance\Repository\QuoteCollection;
use Robsen77\YahooFinance\Service\Quote as QuoteService;

class Api
{
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
     * gets a single quote
     *
     * wrapper for getQuotes()
     *
     * @param $symbol
     * @return Quote
     */
    public function getQuote($symbol)
    {
        $quotesCollection = $this->getQuotes(is_array($symbol) ? $symbol : [$symbol]);

        return $quotesCollection[0];
    }

    /**
     * gets quote for single symbol or an array of symbols
     * @param array $symbols
     * @return QuoteCollection|Quote[]
     */
    public function getQuotes($symbols)
    {
        if (!is_array($symbols)) {
            $symbols = [$symbols];
        }

        /**
         * @var QuoteService
         */
        $service = $this->serviceFactory->create(ServiceFactory::QUOTE);
        return $service->query($symbols);
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
