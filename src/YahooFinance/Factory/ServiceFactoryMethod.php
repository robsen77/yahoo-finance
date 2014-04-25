<?php
/**
 * Class ServiceFactoryMethod
 * @package Robsen77\YahooFinance\Factory
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */
/**
 * ServiceFactoryMethod.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 * Date: 24.04.14
 * Time: 03:16
 */

namespace Robsen77\YahooFinance\Factory;

use Robsen77\YahooFinance\Http\ClientInterface;
use Robsen77\YahooFinance\Service\ServiceInterface;

abstract class ServiceFactoryMethod
{
    const QUOTE = "quote";

    /**
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * @param ClientInterface $httpClient
     */
    final public function __construct(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * creates a service by type
     *
     * @param string $type
     * @return ServiceInterface
     */
    abstract protected function createService($type);

    /**
     * @param string $type
     * @return ServiceInterface
     */
    public function create($type)
    {
        return $this->createService($type);
    }
}
