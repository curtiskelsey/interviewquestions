<?php


namespace AxisCareTest\Model;

use AxisCare\Model\Movie;
use AxisCare\Model\PriceCode;
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