<?php
/**
 * Class Symbol
 * @package Robsen77\YahooFinanceApi\Util
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */
/**
 * Symbol.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 * Date: 24.04.14
 * Time: 01:51
 */

namespace Robsen77\YahooFinanceApi\Util;


class Symbol
{
    /**
     * minimum length allowed for symbols
     */
    const MIN_LENGTH = 2;

    /**
     * maximum length allowed for symbols
     */
    const MAX_LENGTH = 5;

    /**
     * @var string
     */
    private $symbol;

    /**
     * @param $symbol string
     */
    public function __construct($symbol)
    {
        $this->symbol = $symbol;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        if ($this->isEmpty()) {
            return false;
        }

        if ($this->containsNonAlphaNumericLetters()) {
            return false;
        }

        if ($this->lengthIsInvalidValid()) {
            return false;
        }

        return true;
    }

    private function isEmpty()
    {
        $symbol = trim($this->symbol);
        return empty($symbol);
    }

    private function containsNonAlphaNumericLetters()
    {
        return preg_match("/[^a-z0-9]+/i", $this->symbol);
    }

    private function lengthIsInvalidValid()
    {
        $length = strlen($this->symbol);
        return $length < self::MIN_LENGTH || $length > self::MAX_LENGTH;
    }
}
 