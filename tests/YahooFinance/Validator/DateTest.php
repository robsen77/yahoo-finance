<?php
/**
 * Class DateTest
 * @package Robsen77\Tests\YahooFinance\Validator
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */
/**
 * DateTest.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

namespace Robsen77\Tests\YahooFinance\Validator;


use Robsen77\YahooFinance\Validator\Date as DateValidator;

class DateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DateValidator
     */
    private $dateValidator;

    public function initDateInstance($date)
    {
        $this->dateValidator = new DateValidator($date);
    }

    public function testEmptyDate()
    {
        $this->initDateInstance("");

        $bool = $this->dateValidator->isValid();
        $this->assertFalse($bool);
    }

    public function testAlphanumericDate()
    {
        $this->initDateInstance("11aa-11-11");

        $bool = $this->dateValidator->isValid();
        $this->assertFalse($bool);
    }

    public function testInvalidDateScheme()
    {
        $this->initDateInstance("1111-11-1");

        $bool = $this->dateValidator->isValid();
        $this->assertFalse($bool);
    }

    public function testInvalidGregorianDate()
    {
        $this->initDateInstance("2014-14-44");

        $bool = $this->dateValidator->isValid();
        $this->assertFalse($bool);
    }

    public function testDateIsNotALapYear()
    {
        $this->initDateInstance("2014-02-29");

        $bool = $this->dateValidator->isValid();
        $this->assertFalse($bool);
    }
}
