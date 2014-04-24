<?php
/**
 * Class Dispatcher
 * @package Robsen77\YahooFinanceApi
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */
/**
 * Dispatcher.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 * Date: 24.04.14
 * Time: 03:33
 */

namespace Robsen77\YahooFinanceApi;


use Robsen77\YahooFinanceApi\Factory\Api as ApiFactory;
use Robsen77\YahooFinanceApi\Http\HttpClientInterface;

class Dispatcher
{
    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    /**
     * @param HttpClientInterface $httpClient
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param $method
     * @param $args
     * @return mixed
     */
    public function dispatch($method, $args)
    {
        $apiFactory = new ApiFactory($this->httpClient);
        $api = $apiFactory->getInstance($method);

        return $api->get($args);
    }
}
 