<?php
/**
 * Class ServiceInterface
 * @package Robsen77\YahooFinance\Service
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */
/**
 * ServiceInterface.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

namespace Robsen77\YahooFinance\Service;

use Robsen77\YahooFinance\Http\ClientInterface;

interface ServiceInterface
{
    /**
     * @param ClientInterface $httpClient
     */
    public function __construct(ClientInterface $httpClient);

    /**
     * execute query and return result
     * @param array $params
     * @return mixed
     */
    public function query(array $params);
}
