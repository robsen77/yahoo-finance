<?php
/**
 * Class Api
 * @package Robsen77\YahooFinanceApi\Factory
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */
/**
 * Api.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 * Date: 24.04.14
 * Time: 03:16
 */

namespace Robsen77\YahooFinanceApi\Factory;


use Robsen77\YahooFinanceApi\Api\Quote;
use Robsen77\YahooFinanceApi\Exception\ApiFactoryException;
use Robsen77\YahooFinanceApi\Http\HttpClientInterface;

class Api
{
    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param $command
     * @throws \Robsen77\YahooFinanceApi\Exception\ApiFactoryException
     */
    public function getInstance($command)
    {
        switch ($command) {
            case 'quote':
                return $this->getQuoteApi();
        }

        throw new ApiFactoryException("api command $command is not supported!");
    }

    /**
     * @return Quote
     */
    private function getQuoteApi()
    {
        return new Quote($this->httpClient);
    }
}
 