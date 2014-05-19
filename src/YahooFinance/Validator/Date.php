<?php
/**
 * Class Date
 * @package Robsen77\YahooFinance\Validator
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */
/**
 * Date.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

namespace Robsen77\YahooFinance\Validator;


class Date
{
    /**
     * @var string sql date
     */
    private $date;

    const PATTERN = "/^[\d]{4}-[\d]{2}-[\d]{2}$/";

    /**
     * @param string $date sql date to validate
     */
    public function __construct($date)
    {
        $this->date = $date;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        if (!$this->conformsSimplePattern()) {
            return false;
        }

        if (!$this->isValidGregorianDate()) {
            return false;
        }

        return true;
    }

    private function conformsSimplePattern()
    {
        return preg_match(self::PATTERN, $this->date) !== 0;
    }

    private function isValidGregorianDate()
    {
        list($year, $month, $day) = explode("-", $this->date);

        return checkdate($month, $day, $year);
    }
}
