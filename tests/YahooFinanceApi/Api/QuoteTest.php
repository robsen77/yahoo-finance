<?php
/**
 * Class QuoteTest
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */
/**
 * QuoteTest.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 * Date: 24.04.14
 * Time: 02:49
 */

use Robsen77\YahooFinanceApi\Api\Quote;

class QuoteTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Quote
     */
    private $quote;

    public function setUp()
    {
        $this->quote = new Quote();
    }

    /**
     * @expectedException \Robsen77\YahooFinanceApi\Exception\SymbolException
     */
    public function testInvalidSymbolThrowsSymbolException()
    {
        $this->quote->get("!!!!");
    }
}
 