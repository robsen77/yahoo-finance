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

namespace Robsen77\Tests\YahooFinance\Service;

use Robsen77\YahooFinance\Service\Quote;

class QuoteTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Quote
     */
    private $quote;

    public function setUp()
    {
        $httpClient = $this->getMock('Robsen77\YahooFinance\Http\ClientInterface');
        $this->quote = new Quote($httpClient);
    }

    /**
     * @expectedException \Robsen77\YahooFinance\Exception\SymbolException
     */
    public function testInvalidSymbolThrowsSymbolException()
    {
        $this->quote->query(["!!!!"]);
    }

    public function dummy()
    {

    }
}
