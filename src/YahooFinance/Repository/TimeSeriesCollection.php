<?php
/**
 * Class TimeSeriesCollection
 * @package Robsen77\YahooFinance\Repository
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */
/**
 * TimeSeriesCollection.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

namespace Robsen77\YahooFinance\Repository;

use Robsen77\YahooFinance\Entity\TimeSeriesQuote;

class TimeSeriesCollection implements \Iterator, \Countable, \ArrayAccess
{
    /**
     * @var int current position
     */
    private $position = 0;

    /**
     * @var TimeSeriesCollection|TimeSeriesQuote[]
     */
    private $collection;

    /**
     * @param string $jsonData
     */
    public function __construct($jsonData)
    {
        $rawData = json_decode($jsonData);

        if ($rawData->query->count > 1) {
            foreach ($rawData->query->results->quote as $quoteData) {
                $this->offsetSet(null, $this->createEntity($quoteData));
            }
        } else {
            $this->offsetSet(null, $this->createEntity($rawData->query->results->quote));
        }

        $this->position = 0;
    }

    /**
     * @return TimeSeriesQuote
     */
    public function current()
    {
        return $this->collection[$this->position];
    }

    public function next()
    {
        ++$this->position;
    }

    /**
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid()
    {
        return $this->offsetExists($this->position);
    }

    /**
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * The return value is cast to an integer.
     */
    public function count()
    {
        return count($this->collection);
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->collection[$offset]);
    }

    /**
     * @param mixed $offset
     * @return mixed|TimeSeriesQuote
     */
    public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->collection[$offset] : null;
    }

    /**
     * @param int $offset
     * @param TimeSeriesQuote $value
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->collection[] = $value;
        } else {
            $this->collection[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        unset($this->collection[$offset]);
    }

    public function orderByDateAsc()
    {
        $this->orderByDate(SORT_ASC);
    }

    public function orderByDateDesc()
    {
        $this->orderByDate(SORT_DESC);
    }

    private function orderByDate($direction)
    {
        $collection = $this->collection;
        $sortDate = [];
        $sortSymbol = [];

        foreach ($collection as $timeSeriesQuoteEntity) {
            $sortDate[] = $timeSeriesQuoteEntity->getDate();
            $sortSymbol[] = $timeSeriesQuoteEntity->getSymbol();
        }

        array_multisort($sortDate, $direction, SORT_STRING, $sortSymbol, SORT_ASC, SORT_STRING, $collection);

        $this->collection = $collection;
        $this->position = 0;
    }

    /**
     * @param $quoteData
     * @return TimeSeriesQuote
     */
    private function createEntity($quoteData)
    {
        $timeSeriesQuote = new TimeSeriesQuote();

        $timeSeriesQuote->setSymbol($quoteData->Symbol);
        $timeSeriesQuote->setDate($quoteData->Date);
        $timeSeriesQuote->setOpen($quoteData->Open);
        $timeSeriesQuote->setHigh($quoteData->High);
        $timeSeriesQuote->setLow($quoteData->Low);
        $timeSeriesQuote->setClose($quoteData->Close);
        $timeSeriesQuote->setVolume($quoteData->Volume);
        $timeSeriesQuote->setAdjClose($quoteData->Adj_Close);

        return $timeSeriesQuote;
    }
}
