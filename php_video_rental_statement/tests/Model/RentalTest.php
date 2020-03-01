<?php


namespace AxisCareTest\Model;

use AxisCare\Model\Movie;
use AxisCare\Model\PriceCode;
use AxisCare\Model\Rental;
use AxisCare\Option\AxisCareOptions;
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
        $priceCodeService = new PriceCodeService(AxisCareOptions::create());

        $rental = new Rental(
            [
                'movie' => new Movie(
                    [
                        'title' => 'title',
                        'priceCode' => $priceCodeService->fetch(PriceCode::REGULAR)
                    ]
                ),
                'daysRented' => 1
            ]
        );

        $this->assertInstanceOf(Rental::class, $rental);
    }
}
