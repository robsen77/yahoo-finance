<?php
/**
 * Class HttpClientFactory
 * @package Robsen77\YahooFinance\Factory
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */
/**
 * HttpClientFactory.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 * Date: 24.04.14
 * Time: 03:06
 */

namespace Robsen77\YahooFinance\Factory;

use Robsen77\YahooFinance\Config\Config;
use Robsen77\YahooFinance\Exception\HttpClientFactoryException;
use Robsen77\YahooFinance\Http\ClientInterface;

class HttpClientFactory
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @return ClientInterface
     * @throws HttpClientFactoryException
     */
    public function create()
    {
        $class = $this->config->getHttpClient();

        if (!class_exists($class)) {
            throw new HttpClientFactoryException(
                "empty or unknown http client class ($class),
                please provide a http client in configuration."
            );
        }

        /**
         * @var $instance ClientInterface
         */
        $instance = new $class;

        if (!($instance instanceof ClientInterface)) {
            throw new HttpClientFactoryException("instance of http client class is not type of ClientInterface");
        }

        return $instance;
    }
}
