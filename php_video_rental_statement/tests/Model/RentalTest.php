<?php


namespace AxisCareTest\Model;

use AxisCare\Model\Movie;
use AxisCare\Model\MovieClassification;
use AxisCare\Model\PointsProfile;
use AxisCare\Model\RateProfile;
use AxisCare\Model\Rental;
use PHPUnit\Framework\TestCase;

/**
 * Class RentalTest
 * @package AxisCareTest
 */
class RentalTest extends TestCase
{
    public function testConstruct()
    {
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

        $this->assertInstanceOf(Rental::class, $rental);
    }
}
