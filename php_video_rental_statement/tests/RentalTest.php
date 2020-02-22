<?php


namespace AxisCareTest;

use AxisCare\Movie;
use AxisCare\PriceCode;
use AxisCare\Rental;
use AxisCare\Service\PriceCodeService;
use PHPUnit\Framework\TestCase;

/**
 * Class RentalTest
 * @package AxisCareTest
 */
class RentalTest extends TestCase
{
    public function testConstruct()
    {
        $priceCodeService = new PriceCodeService();

        $rental = new Rental(
            new Movie(
                'title',
                $priceCodeService->fetch(PriceCode::REGULAR)
            ),
            1
        );

        $this->assertInstanceOf(Rental::class, $rental);
    }
}
