<?php
/**
 * Class GuzzleClient
 * @package Robsen77\YahooFinanceApi\Http
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */
/**
 * GuzzleClient.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

namespace Robsen77\YahooFinanceApi\Http;

use Guzzle\Http\Client;


class GuzzleClient extends Client implements HttpClientInterface
{
    private $apiKey;

    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }
}
 