<?php

use AxisCare\Enumerable\MimeType;
use AxisCare\Model\Customer;
use AxisCare\Model\Movie;
use AxisCare\Model\MovieClassification;
use AxisCare\Model\Rental;
use AxisCare\Option\AxisCareOptions;
use AxisCare\Service\MovieClassificationService;
use AxisCare\Service\PointsProfileService;
use AxisCare\Service\RateProfileService;
use AxisCare\Service\RentalService;
use AxisCare\Service\StatementService;
use AxisCare\View\ViewManager;

$autoloader = __DIR__ . '/../vendor/autoload.php';

if (!file_exists($autoloader)) {
    throw new RuntimeException(
        'Please run "composer install" from the root of the project to setup autoloading'
    );
}

/** @noinspection PhpIncludeInspection */
require $autoloader;

$acceptHeaderString = $_SERVER['HTTP_ACCEPT'] ?? MimeType::TEXT_PLAIN;
$options = AxisCareOptions::create();
$viewManager = new ViewManager($options);
$movieClassificationService = new MovieClassificationService(
    $options,
    new PointsProfileService($options),
    new RateProfileService($options)
);

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
                            'movieClassification' => $movieClassificationService->fetch(MovieClassification::NEW_RELEASE),
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
                            'movieClassification' => $movieClassificationService->fetch(MovieClassification::REGULAR),
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
                            'movieClassification' => $movieClassificationService->fetch(MovieClassification::CHILDRENS),
                        ]
                    ),
                    'daysRented' => 1
                ]
            ),
        ]
    ]
);

$statement = $statementService->generate($customer);

try {
    echo $viewManager->render($statement, $acceptHeaderString);

} catch (\AxisCare\Exception $exception) {
    http_response_code(400);
}
