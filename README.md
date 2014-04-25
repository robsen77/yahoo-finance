# Yahoo Finance PHP API Client #

> A PHP API Client library for accessing Yahoo! Finance data.

It offers a simple API to access Yahoo! Finance data.

## Description ##

This API Client enables you to work with the Yahoo! Finance API.

### Basic Example ###

```PHP
<?php
    require_once 'vendor/autoload.php';
    $config = new Robsen77\YahooFinance\Config();
    $api = new Robsen77\YahooFinance\Api($config);

    // get quotes for a single share symbol ...
    $quoteCollection = $api->getQuotes("YHOO");
    // ... or get several quotes together
    $quoteCollection = $api->getQuotes(["YHOO","FB", "MS", "GE"]);

    foreach ($quoteCollection as $quote) {
        var_dump($quote);
    }
?>
```

## Requirements ##
* [PHP 5.4 or higher](http://www.php.net/)
* [PHP JSON extension](http://php.net/manual/en/book.json.php)

## Installation ##
There are two options for obtaining the files for the client library.

### Using Composer ###
If you don't have installed Composer now, follow the instructions described at [getcomposer.org](https://getcomposer.org/doc/00-intro.md#installation-nix).
Actually this package is not available at [packagist.org](https://packagist.org/)! So you have to configure your composer.json as follows:

    {
       "repositories": [
           {
               "type": "vcs",
               "url": "https://github.com/robsen77/yahoo-finance"
           }
       ],
       "require": {
           "robsen77/yahoo-finance": "dev-master"
       }
    }

If your composer.json is not blank, feel free to put the things to the right place ;).

### Cloning from GitHub ###
The library is available on [GitHub](https://github.com/robsen77/yahoo-finance). It can be cloned into a local repository with the git clone method.

    git clone https://github.com/robsen77/yahoo-finance.git


## Roadmap ##

solved or in progress:

* quotes

not solved:

* _sectors (open)_
* _historical data (open)_
* _cash flow (open)_
* _income statement (open)_
* _industry (open)_
* _key statistics (open)_