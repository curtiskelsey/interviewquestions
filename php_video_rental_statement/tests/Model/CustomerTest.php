<?php


namespace AxisCareTest\Model;

use AxisCare\Model\Customer;
use AxisCare\Model\Movie;
use AxisCare\Model\MovieClassification;
use AxisCare\Model\PointsProfile;
use AxisCare\Model\RateProfile;
use AxisCare\Model\Rental;
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
        $customer = new Customer(['name' => 'John']);
        $rental = new Rental(
            [
                'movie' => new Movie(
                    [
                        'title' => 'title',
                        'movieClassification' => new MovieClassification(
                            [
                                'name' => 'test',
                                'pointsProfile' => new PointsProfile(),
                                'rateProfile' => new RateProfile(),
                            ]
                        ),
                    ]
                ),
                'daysRented' => 1
            ]
        );

        $customer->addRental($rental);

        $this->assertContains($rental, $customer->getRentals());
    }
}
