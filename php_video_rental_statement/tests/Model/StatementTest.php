<?php


namespace AxisCareTest\Model;

use AxisCare\Model\Customer;
use AxisCare\Model\Statement;
use PHPUnit\Framework\TestCase;

/**
 * Class StatementTest
 * @package AxisCareTest\Model
 */
class StatementTest extends TestCase
{
    public function testAddToTotal()
    {
        $statement = new Statement(
            [
                'customer' => new Customer(['name' => 'John']),
            ]
        );

        $this->assertEquals(0, $statement->getTotal());

        $statement->addToTotal(3);

        $this->assertEquals(3, $statement->getTotal());
    }

    public function testAddFrequentRenterPoints()
    {
        $statement = new Statement(
            [
                'customer' => new Customer(['name' => 'John']),
            ]
        );

        $this->assertEquals(0, $statement->getFrequentRenterPoints());

        $statement->addFrequentRenterPoints(3);

        $this->assertEquals(3, $statement->getFrequentRenterPoints());
    }

    public function testAddLineItem()
    {
        $statement = new Statement(
            [
                'customer' => new Customer(['name' => 'John']),
            ]
        );

        $this->assertCount(0, $statement->getLineItems());

        $statement->addLineItem('test', 1);

        $this->assertCount(1, $statement->getLineItems());
    }
}
