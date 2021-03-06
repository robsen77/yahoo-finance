<?php
/**
 * Class Symbol
 * @package Robsen77\YahooFinance\Util
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

namespace Robsen77\YahooFinance\Validator;


class Symbol
{
    /**
     * minimum length allowed for symbols
     */
    const MIN_LENGTH = 1;

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

        if ($this->lengthIsValid()) {
            return false;
        }

        return true;
    }

    /**
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
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

    private function lengthIsValid()
    {
        $length = strlen($this->symbol);
        return $length < self::MIN_LENGTH || $length > self::MAX_LENGTH;
    }
}
