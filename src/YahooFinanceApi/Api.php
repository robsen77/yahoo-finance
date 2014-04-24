<?php
/**
 * Api.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

namespace Robsen77\YahooFinanceApi;


use Robsen77\YahooFinanceApi\Config\Config;
use Robsen77\YahooFinanceApi\Factory\HttpClient as HttpClientFactory;
use Robsen77\YahooFinanceApi\Http\HttpClientInterface;

/**
 * Class Api
 * @package Robsen77\YahooFinanceApi
 *
 * @method \Robsen77\YahooFinanceApi\Api\Quote quote(string $symbol)
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
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
        $this->dispatcher = new Dispatcher($this->httpClient);
    }

    /**
     * @param $method string
     * @param $args array
     */
    public function __call($method, $args)
    {
        $this->dispatcher->dispatch($method, $args);
    }

    private function initHttpClient($config)
    {
        $httpClientFactory = new HttpClientFactory($config);
        $this->httpClient = $httpClientFactory->get();
    }
}
 