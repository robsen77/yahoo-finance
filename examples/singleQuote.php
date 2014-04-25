<?php
require_once '../vendor/autoload.php';

$config = new \Robsen77\YahooFinance\Config\Config();
$api = new \Robsen77\YahooFinance\Api($config);

$quoteEntity = $api->getQuote("YHOO");

$price = $quoteEntity->getCurrentPrice();

echo "current price (YHOO): $price\n";