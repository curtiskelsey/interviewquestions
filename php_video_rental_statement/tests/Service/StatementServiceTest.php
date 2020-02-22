<?php


namespace AxisCareTest;

use AxisCare\Customer;
use AxisCare\Movie;
use AxisCare\PriceCode;
use AxisCare\Rental;
use AxisCare\Service\PriceCodeService;
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
        $service = new StatementService($priceCodeService);

        $customer = new Customer('name');
        $rental = new Rental(
            new Movie(
                'title',
                $priceCodeService->fetch(PriceCode::REGULAR)
            ),
            1
        );

        $customer->addRental($rental);

        $statement = $service->generate($customer);

        $this->assertStringContainsString(
            'Rental Record for name
	title	2
Amount owed is 2
You earned 1 frequent renter points',
            $statement
        );
    }
}
