<?php
/**
 * Class Dispatcher
 * @package Robsen77\YahooFinance
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */
/**
 * Dispatcher.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

namespace Robsen77\YahooFinance;


use Robsen77\YahooFinance\Factory\ServiceFactory;
use Robsen77\YahooFinance\Http\HttpClientInterface;

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
        $serviceFactory = new ServiceFactory($this->httpClient);
        $service = $serviceFactory->getInstance($method);

        return $service->get($args);
    }
}
