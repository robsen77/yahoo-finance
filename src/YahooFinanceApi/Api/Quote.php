<?php
/**
 * Class Quote
 * @package Robsen77\YahooFinanceApi\Api
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */
/**
 * Quote.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 * Date: 24.04.14
 * Time: 01:45
 */

namespace Robsen77\YahooFinanceApi\Api;


use Robsen77\YahooFinanceApi\Exception\SymbolException;
use Robsen77\YahooFinanceApi\Util\Symbol;

class Quote
{
    /**
     * @var Symbol
     */
    private $symbol;

    /**
     * @param $stockSymbol string
     * @throws \Robsen77\YahooFinanceApi\Exception\SymbolException
     */
    public function get($stockSymbol)
    {
        $this->symbol = new Symbol($stockSymbol);

        if (!$this->symbol->isValid()) {
            throw new SymbolException("stock symbol is invalid");
        }

        return null;
    }
}
 