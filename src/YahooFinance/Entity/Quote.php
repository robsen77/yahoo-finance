<?php
/**
 * Class QuoteCollection
 * @package Robsen77\YahooFinance\Entity
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */
/**
 * QuoteCollection.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

namespace Robsen77\YahooFinance\Entity;


class Quote
{
    /**
     * @var string
     */
    private $symbol;

    /**
     * @var int
     */
    private $averageDailyVolume;

    /**
     * @var float
     */
    private $ask;

    /**
     * @var float
     */
    private $bid;

    /**
     * @var float
     */
    private $bookValue;

    /**
     * @var string
     */
    private $changePercentChange;

    /**
     * @var float
     */
    private $change;

    /**
     * @var string
     */
    private $changeInPercent;

    /**
     * @var float
     */
    private $commission;

    /**
     * @var float
     */
    private $dividendShare;

    /**
     * @var string
     */
    private $lastTradeDate;

    /**
     * @var string
     */
    private $lastTradeTime;

    /**
     * @var string
     */
    private $tradeDate;

    /**
     * earnings per share
     * @var float
     */
    private $eps;

    /**
     * @var float
     */
    private $epsEstimateCurrentYear;

    /**
     * @var float
     */
    private $epsEstimateNextYear;

    /**
     * @var float
     */
    private $epsEstimateNextQuarter;

    /**
     * @var float
     */
    private $daysLow;

    /**
     * @var float
     */
    private $daysHigh;

    /**
     * @var float
     */
    private $yearLow;

    /**
     * @var float
     */
    private $yearHigh;

    /**
     * for example 775.3M
     * @var string
     */
    private $marketCapitalization;

    /**
     * for example 775.3M
     * @var string
     */
    private $ebitda;

    /**
     * @var float
     */
    private $changeFromYearLow;

    /**
     * @var float
     */
    private $changeFromYearHigh;

    /**
     * @var string
     */
    private $percentChangeFromYearLow;

    /**
     * @var float
     */
    private $percentChangeFromYearHigh;

    /**
     * @var float
     */
    private $lastTradePriceOnly;

    /**
     * @var string
     */
    private $daysRange;

    /**
     * @var float
     */
    private $fiftyDayMovingAverage;

    /**
     * @var float
     */
    private $twoHundredDayMovingAverage;

    /**
     * @var float
     */
    private $changeFromFiftyDayMovingAverage;

    /**
     * @var string
     */
    private $percentChangeFromFiftyDayMovingAverage;

    /**
     * @var float
     */
    private $changeFromTwoHundredDayMovingAverage;

    /**
     * @var string
     */
    private $percentChangeFromTwoHundredDayMovingAverage;

    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $open;

    /**
     * @var float
     */
    private $previousClose;

    /**
     * @var float
     */
    private $priceSales;

    /**
     * @var float
     */
    private $priceBook;

    /**
     * @var float
     */
    private $PERatio;

    /**
     * @var float
     */
    private $PEGRatio;

    /**
     * @var float
     */
    private $priceESPEstimateCurrentYear;

    /**
     * @var float
     */
    private $priceESPEstimateNextYear;

    /**
     * @var float
     */
    private $shortRatio;

    /**
     * @var int
     */
    private $volume;

    /**
     * @var string
     */
    private $yearRange;

    /**
     * @var string
     */
    private $stockExchange;

    /**
     * @var float
     */
    private $oneYearPriceTarget;

    /**
     * @var string
     */
    private $percentChange;

    /**
     * @var float
     */
    private $dividendYield;

    /**
     * @var string
     */
    private $exDividendDate;

    /**
     * @var string
     */
    private $dividendPayDate;

    /**
     * @var float
     */
    private $oneYearTargetPrice;

    /**
     * @param float $PEGRatio
     */
    public function setPEGRatio($PEGRatio)
    {
        $this->PEGRatio = $PEGRatio;
    }

    /**
     * @return float
     */
    public function getPEGRatio()
    {
        return $this->PEGRatio;
    }

    /**
     * @param float $PERatio
     */
    public function setPERatio($PERatio)
    {
        $this->PERatio = $PERatio;
    }

    /**
     * @return float
     */
    public function getPERatio()
    {
        return $this->PERatio;
    }

    /**
     * @param float $ask
     */
    public function setAsk($ask)
    {
        $this->ask = $ask;
    }

    /**
     * @return float
     */
    public function getAsk()
    {
        return $this->ask;
    }

    /**
     * @param int $averageDailyVolume
     */
    public function setAverageDailyVolume($averageDailyVolume)
    {
        $this->averageDailyVolume = $averageDailyVolume;
    }

    /**
     * @return int
     */
    public function getAverageDailyVolume()
    {
        return $this->averageDailyVolume;
    }

    /**
     * @param float $bid
     */
    public function setBid($bid)
    {
        $this->bid = $bid;
    }

    /**
     * @return float
     */
    public function getBid()
    {
        return $this->bid;
    }

    /**
     * @param float $bookValue
     */
    public function setBookValue($bookValue)
    {
        $this->bookValue = $bookValue;
    }

    /**
     * @return float
     */
    public function getBookValue()
    {
        return $this->bookValue;
    }

    /**
     * @param float $change
     */
    public function setChange($change)
    {
        $this->change = $change;
    }

    /**
     * @return float
     */
    public function getChange()
    {
        return $this->change;
    }

    /**
     * @param float $changeFromFiftyDayMovingAverage
     */
    public function setChangeFromFiftyDayMovingAverage($changeFromFiftyDayMovingAverage)
    {
        $this->changeFromFiftyDayMovingAverage = $changeFromFiftyDayMovingAverage;
    }

    /**
     * @return float
     */
    public function getChangeFromFiftyDayMovingAverage()
    {
        return $this->changeFromFiftyDayMovingAverage;
    }

    /**
     * @param float $twoHundredDayMovingAverage
     */
    public function setTwoHundredDayMovingAverage($twoHundredDayMovingAverage)
    {
        $this->twoHundredDayMovingAverage = $twoHundredDayMovingAverage;
    }

    /**
     * @return float
     */
    public function getTwoHundredDayMovingAverage()
    {
        return $this->twoHundredDayMovingAverage;
    }

    /**
     * @param float $changeFromTwoHundredDayMovingAverage
     */
    public function setChangeFromTwoHundredDayMovingAverage($changeFromTwoHundredDayMovingAverage)
    {
        $this->changeFromTwoHundredDayMovingAverage = $changeFromTwoHundredDayMovingAverage;
    }

    /**
     * @return float
     */
    public function getChangeFromTwoHundredDayMovingAverage()
    {
        return $this->changeFromTwoHundredDayMovingAverage;
    }

    /**
     * @param float $changeFromYearLow
     */
    public function setChangeFromYearLow($changeFromYearLow)
    {
        $this->changeFromYearLow = $changeFromYearLow;
    }

    /**
     * @return float
     */
    public function getChangeFromYearLow()
    {
        return $this->changeFromYearLow;
    }

    /**
     * @param float $changeFromYearHigh
     */
    public function setChangeFromYearHigh($changeFromYearHigh)
    {
        $this->changeFromYearHigh = $changeFromYearHigh;
    }

    /**
     * @return float
     */
    public function getChangeFromYearHigh()
    {
        return $this->changeFromYearHigh;
    }

    /**
     * @param string $changeInPercent
     */
    public function setChangeInPercent($changeInPercent)
    {
        $this->changeInPercent = $changeInPercent;
    }

    /**
     * @return string
     */
    public function getChangeInPercent()
    {
        return $this->changeInPercent;
    }

    /**
     * @param string $changePercentChange
     */
    public function setChangePercentChange($changePercentChange)
    {
        $this->changePercantChange = $changePercentChange;
    }

    /**
     * @return string
     */
    public function getChangePercentChange()
    {
        return $this->changePercentChange;
    }

    /**
     * @param float $commission
     */
    public function setCommission($commission)
    {
        $this->commission = $commission;
    }

    /**
     * @return float
     */
    public function getCommission()
    {
        return $this->commission;
    }

    /**
     * @param float $daysHigh
     */
    public function setDaysHigh($daysHigh)
    {
        $this->daysHigh = $daysHigh;
    }

    /**
     * @return float
     */
    public function getDaysHigh()
    {
        return $this->daysHigh;
    }

    /**
     * @param float $daysLow
     */
    public function setDaysLow($daysLow)
    {
        $this->daysLow = $daysLow;
    }

    /**
     * @return float
     */
    public function getDaysLow()
    {
        return $this->daysLow;
    }

    /**
     * @param string $daysRange
     */
    public function setDaysRange($daysRange)
    {
        $this->daysRange = $daysRange;
    }

    /**
     * @return string
     */
    public function getDaysRange()
    {
        return $this->daysRange;
    }

    /**
     * @param float $dividendShare
     */
    public function setDividendShare($dividendShare)
    {
        $this->dividendShare = $dividendShare;
    }

    /**
     * @return float
     */
    public function getDividendShare()
    {
        return $this->dividendShare;
    }

    /**
     * @param string $ebitda
     */
    public function setEbitda($ebitda)
    {
        $this->ebitda = $ebitda;
    }

    /**
     * @return string
     */
    public function getEbitda()
    {
        return $this->ebitda;
    }

    /**
     * @param float $eps
     */
    public function setEps($eps)
    {
        $this->eps = $eps;
    }

    /**
     * @return float
     */
    public function getEps()
    {
        return $this->eps;
    }

    /**
     * @param float $epsEstimateCurrentYear
     */
    public function setEpsEstimateCurrentYear($epsEstimateCurrentYear)
    {
        $this->epsEstimateCurrentYear = $epsEstimateCurrentYear;
    }

    /**
     * @return float
     */
    public function getEpsEstimateCurrentYear()
    {
        return $this->epsEstimateCurrentYear;
    }

    /**
     * @param float $epsEstimateNextQuarter
     */
    public function setEpsEstimateNextQuarter($epsEstimateNextQuarter)
    {
        $this->epsEstimateNextQuarter = $epsEstimateNextQuarter;
    }

    /**
     * @return float
     */
    public function getEpsEstimateNextQuarter()
    {
        return $this->epsEstimateNextQuarter;
    }

    /**
     * @param float $epsEstimateNextYear
     */
    public function setEpsEstimateNextYear($epsEstimateNextYear)
    {
        $this->epsEstimateNextYear = $epsEstimateNextYear;
    }

    /**
     * @return float
     */
    public function getEpsEstimateNextYear()
    {
        return $this->epsEstimateNextYear;
    }

    /**
     * @param float $fiftyDayMovingAverage
     */
    public function setFiftyDayMovingAverage($fiftyDayMovingAverage)
    {
        $this->fiftyDayMovingAverage = $fiftyDayMovingAverage;
    }

    /**
     * @return float
     */
    public function getFiftyDayMovingAverage()
    {
        return $this->fiftyDayMovingAverage;
    }

    /**
     * @param string $lastTradeDate
     */
    public function setLastTradeDate($lastTradeDate)
    {
        $this->lastTradeDate = $lastTradeDate;
    }

    /**
     * @return string
     */
    public function getLastTradeDate()
    {
        return $this->lastTradeDate;
    }

    /**
     * @param string $lastTradeTime
     */
    public function setLastTradeTime($lastTradeTime)
    {
        $this->lastTradeTime = $lastTradeTime;
    }

    /**
     * @return string
     */
    public function getLastTradeTime()
    {
        return $this->lastTradeTime;
    }

    /**
     * @param float $lastTradePriceOnly
     */
    public function setLastTradePriceOnly($lastTradePriceOnly)
    {
        $this->lastTradePriceOnly = $lastTradePriceOnly;
    }

    /**
     * gets the current share price
     *
     * wrapper for getLastTradePriceOnly
     *
     * @return float
     */
    public function getCurrentPrice()
    {
        return $this->getLastTradePriceOnly();
    }

    /**
     * @return float
     */
    public function getLastTradePriceOnly()
    {
        return $this->lastTradePriceOnly;
    }

    /**
     * @param string $marketCapitalization
     */
    public function setMarketCapitalization($marketCapitalization)
    {
        $this->marketCapitalization = $marketCapitalization;
    }

    /**
     * @return string
     */
    public function getMarketCapitalization()
    {
        return $this->marketCapitalization;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param float $open
     */
    public function setOpen($open)
    {
        $this->open = $open;
    }

    /**
     * @return float
     */
    public function getOpen()
    {
        return $this->open;
    }

    /**
     * @param string $percentChangeFromFiftyDayMovingAverage
     */
    public function setPercentChangeFromFiftyDayMovingAverage($percentChangeFromFiftyDayMovingAverage)
    {
        $this->percentChangeFromFiftyDayMovingAverage = $percentChangeFromFiftyDayMovingAverage;
    }

    /**
     * @return string
     */
    public function getPercentChangeFromFiftyDayMovingAverage()
    {
        return $this->percentChangeFromFiftyDayMovingAverage;
    }

    /**
     * @param string $percentChangeFromTwoHundredDayMovingAverage
     */
    public function setPercentChangeFromTwoHundredDayMovingAverage($percentChangeFromTwoHundredDayMovingAverage)
    {
        $this->percentChangeFromTwoHundredDayMovingAverage = $percentChangeFromTwoHundredDayMovingAverage;
    }

    /**
     * @return string
     */
    public function getPercentChangeFromTwoHundredDayMovingAverage()
    {
        return $this->percentChangeFromTwoHundredDayMovingAverage;
    }

    /**
     * @param float $percentChangeFromYearHigh
     */
    public function setPercentChangeFromYearHigh($percentChangeFromYearHigh)
    {
        $this->percentChangeFromYearHigh = $percentChangeFromYearHigh;
    }

    /**
     * @return float
     */
    public function getPercentChangeFromYearHigh()
    {
        return $this->percentChangeFromYearHigh;
    }

    /**
     * @param string $percentChangeFromYearLow
     */
    public function setPercentChangeFromYearLow($percentChangeFromYearLow)
    {
        $this->percentChangeFromYearLow = $percentChangeFromYearLow;
    }

    /**
     * @return string
     */
    public function getPercentChangeFromYearLow()
    {
        return $this->percentChangeFromYearLow;
    }

    /**
     * @param float $previousClose
     */
    public function setPreviousClose($previousClose)
    {
        $this->previousClose = $previousClose;
    }

    /**
     * @return float
     */
    public function getPreviousClose()
    {
        return $this->previousClose;
    }

    /**
     * @param float $priceBook
     */
    public function setPriceBook($priceBook)
    {
        $this->priceBook = $priceBook;
    }

    /**
     * @return float
     */
    public function getPriceBook()
    {
        return $this->priceBook;
    }

    /**
     * @param float $priceESPEstimateCurrentYear
     */
    public function setPriceESPEstimateCurrentYear($priceESPEstimateCurrentYear)
    {
        $this->priceESPEstimateCurrentYear = $priceESPEstimateCurrentYear;
    }

    /**
     * @return float
     */
    public function getPriceESPEstimateCurrentYear()
    {
        return $this->priceESPEstimateCurrentYear;
    }

    /**
     * @param float $priceESPEstimateNextYear
     */
    public function setPriceESPEstimateNextYear($priceESPEstimateNextYear)
    {
        $this->priceESPEstimateNextYear = $priceESPEstimateNextYear;
    }

    /**
     * @return float
     */
    public function getPriceESPEstimateNextYear()
    {
        return $this->priceESPEstimateNextYear;
    }

    /**
     * @param float $priceSales
     */
    public function setPriceSales($priceSales)
    {
        $this->priceSales = $priceSales;
    }

    /**
     * @return float
     */
    public function getPriceSales()
    {
        return $this->priceSales;
    }

    /**
     * @param float $shortRatio
     */
    public function setShortRatio($shortRatio)
    {
        $this->shortRatio = $shortRatio;
    }

    /**
     * @return float
     */
    public function getShortRatio()
    {
        return $this->shortRatio;
    }

    /**
     * @param string $stockExchange
     */
    public function setStockExchange($stockExchange)
    {
        $this->stockExchange = $stockExchange;
    }

    /**
     * @return string
     */
    public function getStockExchange()
    {
        return $this->stockExchange;
    }

    /**
     * @param string $symbol
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;
    }

    /**
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * @param string $tradeDate
     */
    public function setTradeDate($tradeDate)
    {
        $this->tradeDate = $tradeDate;
    }

    /**
     * @return string
     */
    public function getTradeDate()
    {
        return $this->tradeDate;
    }

    /**
     * @param int $volume
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;
    }

    /**
     * @return int
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @param float $yearHigh
     */
    public function setYearHigh($yearHigh)
    {
        $this->yearHigh = $yearHigh;
    }

    /**
     * @return float
     */
    public function getYearHigh()
    {
        return $this->yearHigh;
    }

    /**
     * @param float $yearLow
     */
    public function setYearLow($yearLow)
    {
        $this->yearLow = $yearLow;
    }

    /**
     * @return float
     */
    public function getYearLow()
    {
        return $this->yearLow;
    }

    /**
     * @param string $yearRange
     */
    public function setYearRange($yearRange)
    {
        $this->yearRange = $yearRange;
    }

    /**
     * @return string
     */
    public function getYearRange()
    {
        return $this->yearRange;
    }

    /**
     * @param string $dividendPayDate
     */
    public function setDividendPayDate($dividendPayDate)
    {
        $this->dividendPayDate = $dividendPayDate;
    }

    /**
     * @return string
     */
    public function getDividendPayDate()
    {
        return $this->dividendPayDate;
    }

    /**
     * @param float $dividendYield
     */
    public function setDividendYield($dividendYield)
    {
        $this->dividendYield = $dividendYield;
    }

    /**
     * @return float
     */
    public function getDividendYield()
    {
        return $this->dividendYield;
    }

    /**
     * @param string $exDividendDate
     */
    public function setExDividendDate($exDividendDate)
    {
        $this->exDividendDate = $exDividendDate;
    }

    /**
     * @return string
     */
    public function getExDividendDate()
    {
        return $this->exDividendDate;
    }

    /**
     * @param float $oneYearPriceTarget
     */
    public function setOneYearPriceTarget($oneYearPriceTarget)
    {
        $this->oneYearPriceTarget = $oneYearPriceTarget;
    }

    /**
     * @return float
     */
    public function getOneYearPriceTarget()
    {
        return $this->oneYearPriceTarget;
    }

    /**
     * @param string $percentChange
     */
    public function setPercentChange($percentChange)
    {
        $this->percentChange = $percentChange;
    }

    /**
     * @return string
     */
    public function getPercentChange()
    {
        return $this->percentChange;
    }

    /**
     * @param float $oneYearTargetPrice
     */
    public function setOneYearTargetPrice($oneYearTargetPrice)
    {
        $this->oneYearTargetPrice = $oneYearTargetPrice;
    }

    /**
     * @return float
     */
    public function getOneYearTargetPrice()
    {
        return $this->oneYearTargetPrice;
    }
}
