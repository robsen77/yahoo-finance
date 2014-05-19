<?php
require_once '../vendor/autoload.php';

$config = new \Robsen77\YahooFinance\Config\Config();
$api = new \Robsen77\YahooFinance\Api($config);

$timeSeriesCollection = $api->getTimeSeriesQuotes(["YHOO", "MSFT", "HP"], "2014-04-07", "2014-04-11");

// default order: symbol, date desc
echo "default order:\n";
foreach ($timeSeriesCollection as $timeSeriesQuoteEntity) {
    printf(
        "%s\t%s\t%.2f\t%.2f\t%.2f\t%.2f\t%.2f\t%d\n",
        $timeSeriesQuoteEntity->getSymbol(),
        $timeSeriesQuoteEntity->getDate(),
        $timeSeriesQuoteEntity->getOpen(),
        $timeSeriesQuoteEntity->getHigh(),
        $timeSeriesQuoteEntity->getLow(),
        $timeSeriesQuoteEntity->getClose(),
        $timeSeriesQuoteEntity->getAdjClose(),
        $timeSeriesQuoteEntity->getVolume()
    );
}

// and now ordered by date asc, symbol asc
$timeSeriesCollection->orderByDateAsc();

echo "ordered by date asc, symbol asc:\n";
foreach ($timeSeriesCollection as $timeSeriesQuoteEntity) {
    printf(
        "%s\t%s\t%.2f\t%.2f\t%.2f\t%.2f\t%.2f\t%d\n",
        $timeSeriesQuoteEntity->getSymbol(),
        $timeSeriesQuoteEntity->getDate(),
        $timeSeriesQuoteEntity->getOpen(),
        $timeSeriesQuoteEntity->getHigh(),
        $timeSeriesQuoteEntity->getLow(),
        $timeSeriesQuoteEntity->getClose(),
        $timeSeriesQuoteEntity->getAdjClose(),
        $timeSeriesQuoteEntity->getVolume()
    );
}

// and now ordered by date desc, symbol asc
$timeSeriesCollection->orderByDateDesc();

echo "ordered by date desc, symbol asc:\n";
foreach ($timeSeriesCollection as $timeSeriesQuoteEntity) {
    printf(
        "%s\t%s\t%.2f\t%.2f\t%.2f\t%.2f\t%.2f\t%d\n",
        $timeSeriesQuoteEntity->getSymbol(),
        $timeSeriesQuoteEntity->getDate(),
        $timeSeriesQuoteEntity->getOpen(),
        $timeSeriesQuoteEntity->getHigh(),
        $timeSeriesQuoteEntity->getLow(),
        $timeSeriesQuoteEntity->getClose(),
        $timeSeriesQuoteEntity->getAdjClose(),
        $timeSeriesQuoteEntity->getVolume()
    );
}