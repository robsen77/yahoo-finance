<?php
/**
 * Class TimeSeriesQuote
 * @package Robsen77\YahooFinance\Api
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */
/**
 * TimeSeriesQuote.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

namespace Robsen77\YahooFinance\Api;

use Robsen77\YahooFinance\Entity\TimeSeriesQuote as TimeSeriesQuoteEntity;
use Robsen77\YahooFinance\Factory\ServiceFactory;
use Robsen77\YahooFinance\Factory\ServiceFactoryMethod;
use Robsen77\YahooFinance\Repository\TimeSeriesCollection;
use Robsen77\YahooFinance\Service\TimeSeriesQuote as TimeSeriesQuoteService;

trait TimeSeriesQuote
{
    /**
     * @var ServiceFactoryMethod
     */
    private $serviceFactory;

    /**
     * gets quote time series for single symbol or an array of symbols
     * @param array $symbols
     * @param string $dateStart sql start date
     * @param string $dateEnd sql end date
     * @return TimeSeriesCollection|TimeSeriesQuoteEntity[]
     */
    public function getTimeSeriesQuotes($symbols, $dateStart, $dateEnd)
    {
        if (!is_array($symbols)) {
            $symbols = [$symbols];
        }

        $service = $this->getService();
        $service->setDateStart($dateStart);
        $service->setDateEnd($dateEnd);

        return $service->query($symbols);
    }

    /**
     * @return TimeSeriesQuoteService
     */
    private function getService()
    {
        return $this->serviceFactory->create(ServiceFactory::TIME_SERIES);
    }
}
