<?php
/**
 * Class SymbolTest
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */
/**
 * SymbolTest.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 * Date: 24.04.14
 * Time: 01:52
 */

namespace Robsen77\Tests\YahooFinance\Validator;

use Robsen77\YahooFinance\Validator\Symbol as SymbolValidator;

class SymbolTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SymbolValidator
     */
    private $symbolValidator;

    public function initSymbolInstance($symbol)
    {
        $this->symbolValidator = new SymbolValidator($symbol);
    }

    public function testEmptySymbolIsFalse()
    {
        $this->initSymbolInstance("");

        $bool = $this->symbolValidator->isValid();
        $this->assertFalse($bool);
    }

    public function testEmptySymbolIsFalse2()
    {
        $this->initSymbolInstance(" ");

        $bool = $this->symbolValidator->isValid();
        $this->assertFalse($bool);
    }

    public function testSymbolIsNotAlphaNumeric()
    {
        $this->initSymbolInstance("AB!cd123");

        $bool = $this->symbolValidator->isValid();
        $this->assertFalse($bool);
    }

    public function testSymbolIsAlphaNumeric()
    {
        $this->initSymbolInstance("Ad3");

        $bool = $this->symbolValidator->isValid();
        $this->assertTrue($bool);
    }

    public function testLengthGreaterThenMaximum()
    {
        $symbol = str_repeat("A", SymbolValidator::MAX_LENGTH + 1);
        $this->initSymbolInstance($symbol);

        $bool = $this->symbolValidator->isValid();
        $this->assertFalse($bool);
    }

    public function testLengthLesserThenMinimum()
    {
        $symbol = str_repeat("A", SymbolValidator::MIN_LENGTH - 1);
        $this->initSymbolInstance($symbol);

        $bool = $this->symbolValidator->isValid();
        $this->assertFalse($bool);
    }

    public function testLengthIsFine()
    {
        $symbol = str_repeat("A", SymbolValidator::MIN_LENGTH);
        $this->initSymbolInstance($symbol);

        $bool = $this->symbolValidator->isValid();
        $this->assertTrue($bool);
    }
}
