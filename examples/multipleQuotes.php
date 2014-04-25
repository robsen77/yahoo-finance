<?php
require_once '../vendor/autoload.php';

$config = new \Robsen77\YahooFinance\Config\Config();
$api = new \Robsen77\YahooFinance\Api($config);

// gets a collection of quote entities
$quoteCollection = $api->getQuotes(["YHOO", "FB", "MSFT", "GE"]);

foreach ($quoteCollection as $quoteEntity) {
    $company = $quoteEntity->getName();
    $price = $quoteEntity->getCurrentPrice();

    echo "$company: $price\n";
}