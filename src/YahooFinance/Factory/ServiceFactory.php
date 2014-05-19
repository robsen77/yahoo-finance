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
 */

namespace Robsen77\YahooFinance\Factory;


use Robsen77\YahooFinance\Exception\ServiceFactoryException;
use Robsen77\YahooFinance\Service\Quote;
use Robsen77\YahooFinance\Service\ServiceInterface;
use Robsen77\YahooFinance\Service\TimeSeriesQuote;

class ServiceFactory extends ServiceFactoryMethod
{
    /**
     * creates a service by type
     *
     * @param string $type
     * @throws ServiceFactoryException
     * @return ServiceInterface
     */
    protected function createService($type)
    {
        switch ($type) {
            case static::QUOTE:
                return new Quote($this->httpClient);
            case static::TIME_SERIES:
                return new TimeSeriesQuote($this->httpClient);
        }

        throw new ServiceFactoryException("unknown service $type");
    }
}
