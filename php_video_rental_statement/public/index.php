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

$customer = new Customer(
    [
        'name' => 'Susan Ross',
        'rentals' => [
            new Rental(
                [
                    'movie' => new Movie(
                        [
                            'title' => 'Prognosis Negative',
                            'priceCode' => $priceCodeService->fetch(PriceCode::REGULAR)
                        ]
                    ),
                    'daysRented' => 3
                ]
            ),
            new Rental(
                [
                    'movie' => new Movie(
                        [
                            'title' => 'The Pain and the Yearning',
                            'priceCode' => $priceCodeService->fetch(PriceCode::NEW_RELEASE)
                        ]
                    ),
                    'daysRented' => 1
                ]
            ),
            new Rental(
                [
                    'movie' => new Movie(
                        [
                            'title' => 'Sack Lunch',
                            'priceCode' => $priceCodeService->fetch(PriceCode::CHILDRENS)
                        ]
                    ),
                    'daysRented' => 1
                ]
            ),
        ]
    ]
);

$statement = $statementService->generate($customer);

echo $statementService->render($statement, $format);
