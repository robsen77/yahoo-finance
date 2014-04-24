<?php
/**
 * Class Quote
 * @package Robsen77\YahooFinance\Service
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

/**
 * Quote.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

namespace Robsen77\YahooFinance\Service;


use Robsen77\YahooFinance\Exception\SymbolException;
use Robsen77\YahooFinance\Util\Symbol;

class Quote
{
    /**
     * @var Symbol
     */
    private $symbol;

    /**
     * @param string $stockSymbol
     * @throws \Robsen77\YahooFinance\Exception\SymbolException
     * @return null
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
