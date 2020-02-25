<?php

use AxisCare\Customer;
use AxisCare\Movie;
use AxisCare\PriceCode;
use AxisCare\Rental;
use AxisCare\Service\PriceCodeService;
use AxisCare\Service\RentalService;
use AxisCare\Service\StatementService;

$autoloader = __DIR__ . '/../vendor/autoload.php';

if (!file_exists($autoloader)) {
    throw new RuntimeException(
        'Please run "composer install" from the root of the project to setup autoloading'
    );
}

/** @noinspection PhpIncludeInspection */
require $autoloader;

$format = $_GET['format'] ?? null;
$priceCodeService = new PriceCodeService();
$statementService = new StatementService($priceCodeService, new RentalService());

$prognosisNegative = new Movie('Prognosis Negative', $priceCodeService->fetch(PriceCode::REGULAR));
$sackLunch = new Movie('Sack Lunch', $priceCodeService->fetch(PriceCode::CHILDRENS));
$painAndYearning = new Movie('The Pain and the Yearning', $priceCodeService->fetch(PriceCode::NEW_RELEASE));

$customer = new Customer('Susan Ross');
$customer->addRental(
  new Rental($prognosisNegative, 3)
);
$customer->addRental(
  new Rental($painAndYearning, 1)
);
$customer->addRental(
  new Rental($sackLunch, 1)
);

$statement = $statementService->generate($customer);

if ($format === 'html') {
    ?><link rel="stylesheet" href="assets/css/index.css" type="text/css"><?php
    echo $statementService->render($statement, StatementService::HTML_FORMAT);
    return;
}

echo '<pre>';
echo $statementService->render($statement);
echo '</pre>';
