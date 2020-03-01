<?php


namespace AxisCareTest;

use AxisCare\Model\Movie;
use AxisCare\Model\MovieClassification;
use AxisCare\Model\PointsProfile;
use AxisCare\Model\RateProfile;
use AxisCare\Model\Rental;
use AxisCare\Service\RentalService;
use PHPUnit\Framework\TestCase;

/**
 * Class RentalServiceTest
 * @package AxisCareTest
 */
class RentalServiceTest extends TestCase
{
    public function testGetTotal(): void
    {
        $service = new RentalService();

        $rental = new Rental(
            [
                'movie' => new Movie(
                    [
                        'title' => 'test',
                        'movieClassification' => new MovieClassification(
                            [
                                'name' => 'test',
                                'pointsProfile' => new PointsProfile(),
                                'rateProfile' => new RateProfile(),
                            ]
                        ),
                    ]
                ),
                'daysRented' => 3
            ]
        );

        $total = $service->getTotal($rental);
        $this->assertEquals(2.0, $total);
    }
}
