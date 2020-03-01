<?php


namespace AxisCareTest\Model;

use AxisCare\Model\Movie;
use AxisCare\Model\MovieClassification;
use AxisCare\Model\PointsProfile;
use AxisCare\Model\RateProfile;
use PHPUnit\Framework\TestCase;

/**
 * Class MovieTest
 * @package AxisCareTest
 */
class MovieTest extends TestCase
{
    public function testConstruct()
    {
        $movie = new Movie(
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
        );

        $this->assertInstanceOf(Movie::class, $movie);
    }
}
