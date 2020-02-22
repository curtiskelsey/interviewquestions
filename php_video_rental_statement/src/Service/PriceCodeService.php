<?php


namespace AxisCare\Service;

use AxisCare\PriceCode;

/**
 * Class PriceCodeService
 * @package AxisCare
 */
class PriceCodeService
{
    use ConfigAwareTrait;

    public function __construct()
    {
        $this->config = include __DIR__ . '/../../config/local.php';
    }

    /**
     * @return PriceCode[]
     */
    public function fetchAll(): array
    {
        if (!array_key_exists('priceCodes', $this->config)) {
            return [];
        }

        $results = [];

        foreach ($this->config['priceCodes'] as $priceCodeConfig) {
            $results[] = new PriceCode(
                $priceCodeConfig['id'],
                $priceCodeConfig['name'],
                $priceCodeConfig['priceMultiplier'],
                $priceCodeConfig['daysRentedThreshold']
            );
        }

        return $results;
    }
}
