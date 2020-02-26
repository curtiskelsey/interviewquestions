<?php


namespace AxisCareTest\Model;

use AxisCare\Model\Movie;
use AxisCare\Model\PriceCode;
use AxisCare\Model\Rental;
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
                [
                    'title' => 'title',
                    'priceCode' => $priceCodeService->fetch(PriceCode::REGULAR)
                ]
            ),
            1
        );

        $this->assertInstanceOf(Rental::class, $rental);
    }
}
