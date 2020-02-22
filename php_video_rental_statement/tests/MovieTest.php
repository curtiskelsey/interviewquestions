<?php


namespace AxisCareTest;

use AxisCare\Movie;
use PHPUnit\Framework\TestCase;

/**
 * Class MovieTest
 * @package AxisCareTest
 */
class MovieTest extends TestCase
{
    public function testConstruct()
    {
        $movie = new Movie('title', Movie::REGULAR);

        $this->assertInstanceOf(Movie::class, $movie);
    }
}
