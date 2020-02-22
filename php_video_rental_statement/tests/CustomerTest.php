<?php


namespace AxisCareTest;

use AxisCare\Customer;
use AxisCare\Movie;
use AxisCare\PriceCode;
use AxisCare\Rental;
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
        $customer = new Customer('name');

        $this->assertInstanceOf(Customer::class, $customer);
    }

    public function testAddRental(): void
    {
        $priceCodeService = new PriceCodeService();

        $customer = new Customer('name');
        $rental = new Rental(
            new Movie(
                'title',
                $priceCodeService->fetch(PriceCode::REGULAR)
            ),
            1
        );

        $customer->addRental($rental);

        $this->assertContains($rental, $customer->getRentals());
    }
}
