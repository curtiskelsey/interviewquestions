<?php


namespace AxisCareTest;

use AxisCare\Customer;
use AxisCare\Movie;
use AxisCare\Rental;
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
        $customer = new Customer('name');
        $rental = new Rental(
            new Movie('title', Movie::REGULAR),
            1
        );

        $customer->addRental($rental);

        $this->assertContains($rental, $customer->getRentals());
    }

    public function testStatement(): void
    {
        $customer = new Customer('name');
        $rental = new Rental(
            new Movie('title', Movie::REGULAR),
            1
        );

        $customer->addRental($rental);

        $statement = $customer->statement();

        $this->markTestIncomplete('Validate the statement string');
        // TODO validate the statement string
    }
}
