<?php
/**
 * Class TimeSeriesQuote
 * @package Robsen77\YahooFinance\Service
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

/**
 * TimeSeriesQuote.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

namespace Robsen77\YahooFinance\Service;

use Robsen77\YahooFinance\Exception\DateException;
use Robsen77\YahooFinance\Repository\TimeSeriesCollection;
use Robsen77\YahooFinance\Validator\Date;

class TimeSeriesQuote extends Quote implements DateRangeInterface
{
    /**
     * @var string start sql date
     */
    private $dateStart;

    /**
     * @var string end sql date
     */
    private $dateEnd;

    /**
     * sets the start date for a date range
     * @param string $dateStart
     * @return mixed
     */
    public function setDateStart($dateStart)
    {
        $this->validateDate($dateStart);
        $this->dateStart = $dateStart;
    }

    /**
     * sets the end date for a date range
     * @param string $dateEnd
     * @return mixed
     */
    public function setDateEnd($dateEnd)
    {
        $this->validateDate($dateEnd);
        $this->dateEnd = $dateEnd;
    }

    /**
     * @param array $symbols
     * @return mixed|TimeSeriesCollection
     */
    public function query(array $symbols)
    {
        $this->preProcessSymbols($symbols);
        $query = $this->getQuery();

        $jsonResult = $this->httpClient->getQueryResult($query);

        return new TimeSeriesCollection($jsonResult);
    }

    /**
     * validator for input dates
     * @param $date
     * @throws \Robsen77\YahooFinance\Exception\DateException
     */
    private function validateDate($date)
    {
        $dateValidator = new Date($date);

        if (!$dateValidator->isValid()) {
            throw new DateException("date is invalid");
        }
    }

    private function getQuery()
    {
        $query = "
            SELECT * FROM yahoo.finance.historicaldata
            WHERE symbol IN(%s)
            AND startDate = '%s'
            AND endDate = '%s'
        ";

        return $this->prepareQuery($query);
    }

    private function prepareQuery($query)
    {
        $joinedSymbols = $this->getJoinedSymbols();

        return sprintf($query, $joinedSymbols, $this->dateStart, $this->dateEnd);
    }
}
