<?php
/**
 * Service.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

namespace Robsen77\YahooFinance;


use Robsen77\YahooFinance\Config\Config;
use Robsen77\YahooFinance\Factory\HttpClient as HttpClientFactory;
use Robsen77\YahooFinance\Http\HttpClientInterface;

/**
 * Class Service
 *
 * @package Robsen77\YahooFinance
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 *
 * @method \Robsen77\YahooFinance\Service\Quote quote(string $symbol)
 */
class Api
{
    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    /**
     * @var Dispatcher
     */
    private $dispatcher;

    /**
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->initHttpClient($config);
        $this->initDispatcher();
    }

    /**
     * @param $method string
     * @param $args array
     */
    public function __call($method, $args)
    {
        $this->dispatcher->dispatch($method, $args);
    }

    /**
     * initializes the http client
     * @param Config $config
     */
    private function initHttpClient(Config $config)
    {
        $httpClientFactory = new HttpClientFactory($config);
        $this->httpClient = $httpClientFactory->get();
    }

    /**
     * initializes the service dispatcher
     */
    private function initDispatcher()
    {
        $this->dispatcher = new Dispatcher($this->httpClient);
    }
}
