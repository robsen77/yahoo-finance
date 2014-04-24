<?php
/**
 * Class HttpClient
 * @package Robsen77\YahooFinanceApi\Factory
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */
/**
 * HttpClient.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 * Date: 24.04.14
 * Time: 03:06
 */

namespace Robsen77\YahooFinanceApi\Factory;

use Robsen77\YahooFinanceApi\Config\Config;
use Robsen77\YahooFinanceApi\Http\HttpClientInterface;

class HttpClient
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
     * @return HttpClientInterface
     */
    public function get()
    {
        $apiKey = $this->config->getApiKey();
        $class = $this->config->getHttpClient();

        /**
         * @var $instance HttpClientInterface
         */
        $instance = new $class;
        $instance->setApiKey($apiKey);

        return $instance;
    }
}
 