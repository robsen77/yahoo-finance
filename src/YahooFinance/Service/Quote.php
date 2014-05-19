<?php
/**
 * Class QuoteCollection
 * @package Robsen77\YahooFinance\Service
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

/**
 * QuoteCollection.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

namespace Robsen77\YahooFinance\Service;


use Robsen77\YahooFinance\Exception\SymbolException;
use Robsen77\YahooFinance\Http\ClientInterface;
use Robsen77\YahooFinance\Repository\QuoteCollection;
use Robsen77\YahooFinance\Validator\Symbol;

class Quote implements ServiceInterface
{
    /**
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * @var Symbol[]
     */
    protected $symbols = [];

    /**
     * @param ClientInterface $httpClient
     */
    public function __construct(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param array $symbols
     * @return mixed|QuoteCollection
     */
    public function query(array $symbols)
    {
        $this->preProcessSymbols($symbols);
        $query = $this->getQuery();

        $jsonResult = $this->httpClient->getQueryResult($query);

        return new QuoteCollection($jsonResult);
    }

    /**
     * validates symbols and creates an array of symbol objects for further operations
     * @param array $symbols
     * @throws \Robsen77\YahooFinance\Exception\SymbolException
     */
    protected function preProcessSymbols(array $symbols)
    {
        foreach ($symbols as $symbolRun) {
            $symbolUtil = new Symbol($symbolRun);

            if (!$symbolUtil->isValid()) {
                throw new SymbolException("stock symbol is invalid");
            }

            $this->symbols[] = $symbolUtil;
        }
    }

    private function getQuery()
    {
        $query = "SELECT * FROM yahoo.finance.quotes WHERE symbol IN(%s)";
        return $this->prepareQuery($query);
    }

    private function prepareQuery($query)
    {
        $joinedSymbols = $this->getJoinedSymbols();
        return sprintf($query, $joinedSymbols);
    }

    protected function getJoinedSymbols()
    {
        $symbols = [];

        foreach ($this->symbols as $symbol) {
            $symbols[] = "'" . $symbol->getSymbol() . "'";
        }

        return join(",", $symbols);
    }
}
