<?php
/**
 * Class ServiceFactory
 * @package Robsen77\YahooFinance\Factory
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */
/**
 * ServiceFactory.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 * Date: 24.04.14
 * Time: 03:16
 */

namespace Robsen77\YahooFinance\Factory;


use Robsen77\YahooFinance\Exception\ServiceFactoryException;
use Robsen77\YahooFinance\Http\HttpClientInterface;
use Robsen77\YahooFinance\Service\Quote;

class ServiceFactory
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
     * @throws \Robsen77\YahooFinance\Exception\ServiceFactoryException
     */
    public function getInstance($command)
    {
        switch ($command) {
            case 'quote':
                return $this->getQuoteApi();
        }

        throw new ServiceFactoryException("api command $command is not supported!");
    }

    /**
     * @return Quote
     */
    private function getQuoteApi()
    {
        return new Quote($this->httpClient);
    }
}
