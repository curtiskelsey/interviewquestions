<?php


namespace AxisCareTest;

use AxisCare\Model\PriceCode;
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

    public function testFetch(): void
    {
        $service = new PriceCodeService();

        $priceCode = $service->fetch(PriceCode::REGULAR);

        $this->assertInstanceOf(PriceCode::class, $priceCode);
    }
}
