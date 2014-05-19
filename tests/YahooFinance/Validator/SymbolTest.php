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

use Robsen77\YahooFinance\Validator\Symbol;

class SymbolTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Robsen77\YahooFinance\Validator\Symbol
     */
    private $symbol;

    public function initSymbolInstance($symbol)
    {
        $this->symbol = new Symbol($symbol);
    }

    public function testEmptySymbolIsFalse()
    {
        $this->initSymbolInstance("");

        $bool = $this->symbol->isValid();
        $this->assertFalse($bool);
    }

    public function testEmptySymbolIsFalse2()
    {
        $this->initSymbolInstance(" ");

        $bool = $this->symbol->isValid();
        $this->assertFalse($bool);
    }

    public function testSymbolIsNotAlphaNumeric()
    {
        $this->initSymbolInstance("AB!cd123");

        $bool = $this->symbol->isValid();
        $this->assertFalse($bool);
    }

    public function testSymbolIsAlphaNumeric()
    {
        $this->initSymbolInstance("Ad3");

        $bool = $this->symbol->isValid();
        $this->assertTrue($bool);
    }

    public function testLengthGreaterThenMaximum()
    {
        $symbol = str_repeat("A", Symbol::MAX_LENGTH + 1);
        $this->initSymbolInstance($symbol);

        $bool = $this->symbol->isValid();
        $this->assertFalse($bool);
    }

    public function testLengthLesserThenMinimum()
    {
        $symbol = str_repeat("A", Symbol::MIN_LENGTH - 1);
        $this->initSymbolInstance($symbol);

        $bool = $this->symbol->isValid();
        $this->assertFalse($bool);
    }

    public function testLengthIsFine()
    {
        $symbol = str_repeat("A", Symbol::MIN_LENGTH);
        $this->initSymbolInstance($symbol);

        $bool = $this->symbol->isValid();
        $this->assertTrue($bool);
    }
}
