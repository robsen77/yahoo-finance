<?php
/**
 * Class QuoteCollection
 * @package Robsen77\YahooFinance\Repository
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */
/**
 * QuoteCollection.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

namespace Robsen77\YahooFinance\Repository;

use Robsen77\YahooFinance\Entity\Quote;

class QuoteCollection implements \Iterator, \Countable, \ArrayAccess
{
    /**
     * @var int current position
     */
    private $position = 0;

    /**
     * @var array
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
     * @return Quote
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
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->collection[$offset]);
    }

    /**
     * @return Quote|null
     */
    public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->collection[$offset] : null;
    }

    /**
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

    /**
     * @param $quoteData
     * @return Quote
     */
    private function createEntity($quoteData)
    {
        $quote = new \Robsen77\YahooFinance\Entity\Quote();

        $quote->setSymbol($quoteData->Symbol);
        $quote->setAsk($quoteData->Ask);
        $quote->setBid($quoteData->Bid);
        $quote->setAverageDailyVolume($quoteData->AverageDailyVolume);
        $quote->setBookValue($quoteData->BookValue);
        $quote->setChangePercentChange($quoteData->Change_PercentChange);
        $quote->setChange($quoteData->Change);
        $quote->setDividendShare($quoteData->DividendShare);
        $quote->setLastTradeDate($quoteData->LastTradeDate);
        $quote->setLastTradeTime($quoteData->LastTradeTime);
        $quote->setTradeDate($quoteData->TradeDate);
        $quote->setEps($quoteData->EarningsShare);
        $quote->setEpsEstimateCurrentYear($quoteData->EPSEstimateCurrentYear);
        $quote->setEpsEstimateNextYear($quoteData->EPSEstimateNextYear);
        $quote->setEpsEstimateNextQuarter($quoteData->EPSEstimateNextQuarter);
        $quote->setDaysHigh($quoteData->DaysHigh);
        $quote->setDaysLow($quoteData->DaysLow);
        $quote->setYearHigh($quoteData->YearHigh);
        $quote->setYearLow($quoteData->YearLow);
        $quote->setMarketCapitalization($quoteData->MarketCapitalization);
        $quote->setEbitda($quoteData->EBITDA);
        $quote->setChangeFromYearLow($quoteData->ChangeFromYearLow);
        $quote->setChangeFromYearHigh($quoteData->ChangeFromYearHigh);
        $quote->setPercentChangeFromYearLow($quoteData->PercentChangeFromYearLow);
        $quote->setPercentChangeFromYearHigh($quoteData->PercebtChangeFromYearHigh);
        $quote->setLastTradePriceOnly($quoteData->LastTradePriceOnly);
        $quote->setDaysRange($quoteData->DaysRange);
        $quote->setFiftyDayMovingAverage($quoteData->FiftydayMovingAverage);
        $quote->setTwoHundredDayMovingAverage($quoteData->TwoHundreddayMovingAverage);
        $quote->setChangeFromFiftyDayMovingAverage($quoteData->ChangeFromFiftydayMovingAverage);
        $quote->setChangeFromTwoHundredDayMovingAverage($quoteData->ChangeFromTwoHundreddayMovingAverage);
        $quote->setPercentChangeFromFiftyDayMovingAverage($quoteData->PercentChangeFromFiftydayMovingAverage);
        $quote->setPercentChangeFromTwoHundredDayMovingAverage($quoteData->PercentChangeFromTwoHundreddayMovingAverage);
        $quote->setName($quoteData->Name);
        $quote->setOpen($quoteData->Open);
        $quote->setPreviousClose($quoteData->PreviousClose);
        $quote->setChangeInPercent($quoteData->ChangeinPercent);
        $quote->setPriceSales($quoteData->PriceSales);
        $quote->setPriceBook($quoteData->PriceBook);
        $quote->setPERatio($quoteData->PERatio);
        $quote->setPEGRatio($quoteData->PEGRatio);
        $quote->setPriceESPEstimateCurrentYear($quoteData->PriceEPSEstimateCurrentYear);
        $quote->setPriceESPEstimateNextYear($quoteData->PriceEPSEstimateNextYear);
        $quote->setShortRatio($quoteData->ShortRatio);
        $quote->setVolume($quoteData->Volume);
        $quote->setYearRange($quoteData->YearRange);
        $quote->setStockExchange($quoteData->StockExchange);

        $quote->setPercentChange($quoteData->PercentChange);
        $quote->setDividendShare($quoteData->DividendShare);
        $quote->setDividendYield($quoteData->DividendYield);

        $quote->setOneYearTargetPrice($quoteData->OneyrTargetPrice);
        $quote->setExDividendDate($quoteData->ExDividendDate);
        $quote->setDividendPayDate($quoteData->DividendPayDate);

        return $quote;
    }
}
