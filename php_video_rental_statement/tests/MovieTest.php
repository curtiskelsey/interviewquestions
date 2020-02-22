<?php


namespace AxisCareTest;

use AxisCare\Movie;
use AxisCare\PriceCode;
use AxisCare\Service\PriceCodeService;
use PHPUnit\Framework\TestCase;

/**
 * Class MovieTest
 * @package AxisCareTest
 */
class MovieTest extends TestCase
{
    public function testConstruct()
    {
        $priceCodeService = new PriceCodeService();

        $movie = new Movie(
            'title',
            $priceCodeService->fetch(PriceCode::REGULAR)
        );

        $this->assertInstanceOf(Movie::class, $movie);
    }
}
