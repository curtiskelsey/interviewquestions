<?php


namespace AxisCareTest;

use AxisCare\Movie;
use AxisCare\Rental;
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
            new Movie('title', Movie::REGULAR),
            1
        );

        $this->assertInstanceOf(Rental::class, $rental);
    }
}
