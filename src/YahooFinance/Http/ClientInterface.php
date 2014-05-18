<?php
/**
 * Class ClientInterface
 * @package Robsen77\YahooFinance\Http
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */
/**
 * ClientInterface.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 * Date: 24.04.14
 * Time: 03:05
 */

namespace Robsen77\YahooFinance\Http;


interface ClientInterface
{
    /**
     * executes a query
     * @param string $query
     * @return string json
     */
    public function getQueryResult($query);
}
