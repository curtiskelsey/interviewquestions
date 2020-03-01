<?php


namespace AxisCare\Service;

use AxisCare\Model\PriceCode;

/**
 * Class PriceCodeService
 * @package AxisCare
 * @property PriceCode[] $cache
 * @method PriceCode|null fetch(int $id)
 */
class PriceCodeService extends AbstractDataProvider
{
    /**
     * @return PriceCode[]
     */
    public function fetchAll(): array
    {
        if ($this->cache) {
            return $this->cache;
        }

        foreach ($this->getAxisCareOptions()->getPriceCodes() as $priceCodeConfig) {
            $this->cache[$priceCodeConfig['id']] = new PriceCode(
                $priceCodeConfig
            );
        }

        return $this->cache;
    }
}
