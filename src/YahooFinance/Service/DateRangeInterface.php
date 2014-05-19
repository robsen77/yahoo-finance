<?php
/**
 * Class DateRangeInterface
 * @package Robsen77\YahooFinance\Service
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */
/**
 * DateRangeInterface.php
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

namespace Robsen77\YahooFinance\Service;

interface DateRangeInterface
{
    /**
     * sets the start date for a date range
     * @param string $dateStart
     * @return mixed
     */
    public function setDateStart($dateStart);

    /**
     * sets the end date for a date range
     * @param string $dateEnd
     * @return mixed
     */
    public function setDateEnd($dateEnd);
}
