<?php
/**
 * Class Quote
 * @package Robsen77\YahooFinance\Api
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */
/**
 * Quote.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

namespace Robsen77\YahooFinance\Api;

use Robsen77\YahooFinance\Entity\Quote as QuoteEntity;
use Robsen77\YahooFinance\Factory\ServiceFactory;
use Robsen77\YahooFinance\Factory\ServiceFactoryMethod;
use Robsen77\YahooFinance\Repository\QuoteCollection;
use Robsen77\YahooFinance\Service\Quote as QuoteService;

trait Quote
{
    /**
     * @var ServiceFactoryMethod
     */
    private $serviceFactory;

    /**
     * gets a single quote
     *
     * wrapper for getQuotes()
     *
     * @param $symbol
     * @return QuoteEntity
     */
    public function getQuote($symbol)
    {
        $quotesCollection = $this->getQuotes(is_array($symbol) ? $symbol : [$symbol]);

        return $quotesCollection[0];
    }

    /**
     * gets quote for single symbol or an array of symbols
     * @param array $symbols
     * @return QuoteCollection|QuoteEntity[]
     */
    public function getQuotes($symbols)
    {
        if (!is_array($symbols)) {
            $symbols = [$symbols];
        }

        /**
         * @var QuoteService
         */
        $service = $this->serviceFactory->create(ServiceFactory::QUOTE);
        return $service->query($symbols);
    }
}
