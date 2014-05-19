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

namespace Robsen77\YahooFinance\Entity;


class TimeSeriesQuote
{
    /**
     * @var string
     */
    private $symbol;

    /**
     * @var string
     */
    private $date;

    /**
     * @var float
     */
    private $open;

    /**
     * @var float
     */
    private $high;

    /**
     * @var float
     */
    private $low;

    /**
     * @var float
     */
    private $close;

    /**
     * @var int
     */
    private $volume;

    /**
     * @var float
     */
    private $adjClose;

    /**
     * @param float $adjClose
     */
    public function setAdjClose($adjClose)
    {
        $this->adjClose = (float)$adjClose;
    }

    /**
     * @return float
     */
    public function getAdjClose()
    {
        return $this->adjClose;
    }

    /**
     * @param float $close
     */
    public function setClose($close)
    {
        $this->close = (float)$close;
    }

    /**
     * @return float
     */
    public function getClose()
    {
        return $this->close;
    }

    /**
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param float $high
     */
    public function setHigh($high)
    {
        $this->high = (float)$high;
    }

    /**
     * @return float
     */
    public function getHigh()
    {
        return $this->high;
    }

    /**
     * @param float $low
     */
    public function setLow($low)
    {
        $this->low = (float)$low;
    }

    /**
     * @return float
     */
    public function getLow()
    {
        return $this->low;
    }

    /**
     * @param float $open
     */
    public function setOpen($open)
    {
        $this->open = (float)$open;
    }

    /**
     * @return float
     */
    public function getOpen()
    {
        return $this->open;
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
     * @param int $volume
     */
    public function setVolume($volume)
    {
        $this->volume = (int)$volume;
    }

    /**
     * @return int
     */
    public function getVolume()
    {
        return $this->volume;
    }
}
