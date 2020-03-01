<?php


namespace AxisCareTest;

use AxisCare\Model\PriceCode;
use AxisCare\Option\AxisCareOptions;
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
        $service = new PriceCodeService(AxisCareOptions::create());

        $priceCodes = $service->fetchAll();

        foreach ($priceCodes as $priceCode) {
            $this->assertInstanceOf(PriceCode::class, $priceCode);
        }
    }

    public function testFetch(): void
    {
        $service = new PriceCodeService(AxisCareOptions::create());

        $priceCode = $service->fetch(PriceCode::REGULAR);

        $this->assertInstanceOf(PriceCode::class, $priceCode);
    }
}
