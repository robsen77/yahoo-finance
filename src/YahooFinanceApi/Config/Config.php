<?php
/**
 * Class Config
 * @package Robsen77\YahooFinanceApi\Config
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */
/**
 * Config.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 * Date: 24.04.14
 * Time: 02:59
 */

namespace Robsen77\YahooFinanceApi\Config;


class Config
{
    /**
     * @var string your Yahoo API key
     */
    private $apiKey;

    /**
     * @var string http client
     */
    private $httpClient = "\\Robsen77\\YahooFinanceApi\\Http\\GuzzleClient";


    /**
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param string $httpClient
     */
    public function setHttpClient($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @return string
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }
}
 