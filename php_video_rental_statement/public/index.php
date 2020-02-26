<?php

use AxisCare\Model\Customer;
use AxisCare\Model\Movie;
use AxisCare\Model\PriceCode;
use AxisCare\Model\Rental;
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
$statementService = new StatementService(new RentalService());

$prognosisNegative = new Movie(
    [
        'title' => 'Prognosis Negative',
        'priceCode' => $priceCodeService->fetch(PriceCode::REGULAR)
    ]
);

$sackLunch = new Movie(
    [
        'title' => 'Sack Lunch',
        'priceCode' => $priceCodeService->fetch(PriceCode::CHILDRENS)
    ]
);

$painAndYearning = new Movie(
    [
        'title' => 'The Pain and the Yearning',
        'priceCode' => $priceCodeService->fetch(PriceCode::NEW_RELEASE)
    ]
);

$customer = new Customer(
    [
        'name' => 'Susan Ross'
    ]
);

$customer->addRental(
    new Rental(['movie' => $prognosisNegative, 'daysRented' => 3])
);
$customer->addRental(
    new Rental(['movie' => $painAndYearning, 'daysRented' => 1])
);
$customer->addRental(
    new Rental(['movie' => $sackLunch, 'daysRented' => 1])
);

$statement = $statementService->generate($customer);

if ($format === 'html') {
    ?>
    <link rel="stylesheet" href="assets/css/index.css" type="text/css"><?php
    echo $statementService->render($statement, StatementService::HTML_FORMAT);
    return;
}

echo '<pre>';
echo $statementService->render($statement);
echo '</pre>';
