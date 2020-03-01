<?php


namespace AxisCareTest\Option;

use AxisCare\Option\AxisCareOptions;
use PHPUnit\Framework\TestCase;

/**
 * Class AxisCareOptionsTest
 * @package AxisCareTest\Option
 */
class AxisCareOptionsTest extends TestCase
{
    public function testCreate(): void
    {
        $options = AxisCareOptions::create();

        $this->assertInstanceOf(AxisCareOptions::class, $options);
    }
}
