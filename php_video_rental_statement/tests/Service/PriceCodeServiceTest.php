<?php


namespace AxisCareTest;

use AxisCare\PriceCode;
use AxisCare\Service\PriceCodeService;
use PHPUnit\Framework\TestCase;

/**
 * Class PriceCodeServiceTest
 * @package AxisCareTest
 */
class PriceCodeServiceTest extends TestCase
{
    public function testFetchAll(): void
    {
        $service = new PriceCodeService();

        $priceCodes = $service->fetchAll();

        foreach ($priceCodes as $priceCode) {
            $this->assertInstanceOf(PriceCode::class, $priceCode);
        }
    }
}
