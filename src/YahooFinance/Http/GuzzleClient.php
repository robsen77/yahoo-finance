<?php
/**
 * Class GuzzleClient
 * @package Robsen77\YahooFinance\Http
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */
/**
 * GuzzleClient.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

namespace Robsen77\YahooFinance\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Message\ResponseInterface;
use Robsen77\YahooFinance\Exception\HttpException;

class GuzzleClient implements ClientInterface
{
    /**
     * @var string user Yahoo Api key
     */
    private $apiKey;

    /**
     * @var string Yahoo Api endpoint
     */
    private $apiBaseUrl = "https://query.yahooapis.com/v1/public/yql";

    /**
     * Api base params
     * @var string
     */
    private $basePrams = "&format=json&diagnostics=false&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";

    /**
     * @var Client
     */
    private $guzzleClient;

    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * initializes the guzzle http client
     */
    public function __construct()
    {
        $this->guzzleClient = new Client(['base_url' => $this->apiBaseUrl]);
    }

    /**
     * sets the Yahoo Api key
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @param null|string $query
     * @throws HttpException
     * @return string json
     */
    public function getQueryResult($query)
    {
        $query = urlencode($query);
        $url = $this->apiBaseUrl
            . '?q=' . $query
            . $this->basePrams;

        $this->response = $this->guzzleClient->get($url);

        if (!$this->isStatusCode200()) {
            throw new HttpException("http request failed with status code " . $this->getResponseStatusCode());
        }

        return $this->getResponseBody();
    }

    /**
     * @return bool
     */
    private function isStatusCode200()
    {
        return $this->getResponseStatusCode() == 200;
    }

    /**
     * @return string
     */
    private function getResponseStatusCode()
    {
        return $this->response->getStatusCode();
    }

    /**
     * @return string
     */
    private function getResponseBody()
    {
        return $this->response->getBody();
    }
}
