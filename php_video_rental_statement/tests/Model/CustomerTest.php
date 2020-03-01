<?php


namespace AxisCareTest\Model;

use AxisCare\Model\Customer;
use AxisCare\Model\Movie;
use AxisCare\Model\PriceCode;
use AxisCare\Model\Rental;
use AxisCare\Option\AxisCareOptions;
use AxisCare\Service\PriceCodeService;
use PHPUnit\Framework\TestCase;

/**
 * Class Customer
 * @package AxisCareTest
 */
class CustomerTest extends TestCase
{
    public function testConstruct(): void
    {
        $customer = new Customer(['name' => 'John']);

        $this->assertInstanceOf(Customer::class, $customer);
    }

    public function testAddRental(): void
    {
        $priceCodeService = new PriceCodeService(AxisCareOptions::create());

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

        $this->assertContains($rental, $customer->getRentals());
    }
}
