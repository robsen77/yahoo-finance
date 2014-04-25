<?php
require_once '../vendor/autoload.php';

$config = new \Robsen77\YahooFinance\Config\Config();
$api = new \Robsen77\YahooFinance\Api($config);

$quoteEntity = $api->getQuote("YHOO");

$symbol = $quoteEntity->getSymbol();
$company = $quoteEntity->getName();
$price = $quoteEntity->getCurrentPrice();
$date = $quoteEntity->getLastTradeDate();
$time = $quoteEntity->getLastTradeTime();
$openPrice = $quoteEntity->getOpen();
$daysRange = $quoteEntity->getDaysRange();

echo "$symbol - $company\n";
echo "current price: $price ($date $time)\n";
echo "days range: $daysRange\n";
echo "open price: $openPrice\n";