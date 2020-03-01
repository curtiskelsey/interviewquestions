<?php


namespace AxisCareTest;

use AxisCare\Model\Customer;
use AxisCare\Model\Movie;
use AxisCare\Model\MovieClassification;
use AxisCare\Model\PointsProfile;
use AxisCare\Model\RateProfile;
use AxisCare\Model\Rental;
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
        $service = new StatementService(new RentalService());

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
                        )
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
