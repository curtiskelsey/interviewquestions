<?php


namespace AxisCareTest;

use AxisCare\Model\Customer;
use AxisCare\Model\Movie;
use AxisCare\Model\PriceCode;
use AxisCare\Model\Rental;
use AxisCare\Service\PriceCodeService;
use AxisCare\Service\RentalService;
use AxisCare\Service\StatementService;
use PHPUnit\Framework\TestCase;

/**
 * Class StatementServiceTest
 * @package AxisCareTest
 */
class StatementServiceTest extends TestCase
{
    public function testPlaintextStatement(): void
    {
        $priceCodeService = new PriceCodeService();
        $service = new StatementService(new RentalService());

        $customer = new Customer('name');
        $rental = new Rental(
            [
                'movie' => new Movie(
                    [
                        'title' => 'title',
                        'priceCode' => $priceCodeService->fetch(PriceCode::REGULAR)
                    ]
                ),
                'daysRented' => 1
            ]
        );

        $customer->addRental($rental);

        $statement = $service->generate($customer);

        $this->assertStringContainsString(
            'Rental Record for name
	title	2
Amount owed is 2
You earned 1 frequent renter points',
            $service->render($statement)
        );
    }

    public function testHtmlStatement(): void
    {
        $priceCodeService = new PriceCodeService();
        $service = new StatementService(new RentalService());

        $customer = new Customer('name');
        $rental = new Rental(
            [
                'movie' => new Movie(
                    [
                        'title' => 'title',
                        'priceCode' => $priceCodeService->fetch(PriceCode::REGULAR)
                    ]
                ),
                'daysRented' => 1
            ]
        );

        $customer->addRental($rental);

        $statement = $service->generate($customer);

        $this->assertStringContainsString(
            '<h1',
            $service->render($statement, StatementService::HTML_FORMAT)
        );
    }
}
