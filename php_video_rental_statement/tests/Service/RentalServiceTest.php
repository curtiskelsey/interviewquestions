<?php


namespace AxisCareTest;

use AxisCare\Model\Movie;
use AxisCare\Model\PriceCode;
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
                        'priceCode' => new PriceCode(
                            [
                                'priceMultiplier' => 5,
                                'daysRentedThreshold' => 1,
                                'flatRate' => 2,
                            ]
                        )
                    ]
                ),
                'daysRented' => 3
            ]
        );

        $total = $service->getTotal($rental);
        $this->assertEquals(12, $total);
    }
}
