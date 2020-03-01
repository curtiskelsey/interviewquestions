<?php


namespace AxisCareTest;

use AxisCare\Model\Customer;
use AxisCare\Model\Movie;
use AxisCare\Model\PriceCode;
use AxisCare\Model\Rental;
use AxisCare\Option\AxisCareOptions;
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
    public function testGenerate(): void
    {
        $priceCodeService = new PriceCodeService(AxisCareOptions::create());
        $service = new StatementService(new RentalService());

        $customer = new Customer(['name' => 'John']);
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

        $this->assertCount(1, $statement->getLineItems());
    }
}
