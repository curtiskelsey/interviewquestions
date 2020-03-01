<?php


namespace AxisCare\Service;

use AxisCare\DataProviderInterface;
use AxisCare\Model\PriceCode;
use AxisCare\Option\AxisCareOptions;
use AxisCare\Option\AxisCareOptionsAwareTrait;

/**
 * Class PriceCodeService
 * @package AxisCare
 */
class PriceCodeService implements DataProviderInterface
{
    use AxisCareOptionsAwareTrait;

    /** @var PriceCode[] */
    private $priceCodes = [];

    public function __construct(AxisCareOptions $axisCareOptions)
    {
        $this->axisCareOptions = $axisCareOptions;
    }

    /**
     * @return PriceCode[]
     */
    public function fetchAll(): array
    {
        if ($this->priceCodes) {
            return $this->priceCodes;
        }

        foreach ($this->getAxisCareOptions()->getPriceCodes() as $priceCodeConfig) {
            $this->priceCodes[$priceCodeConfig['id']] = new PriceCode(
                $priceCodeConfig
            );
        }

        return $this->priceCodes;
    }

    public function fetch(int $id): ?PriceCode
    {
        if (!$this->priceCodes) {
            $this->fetchAll();
        }

        if (array_key_exists($id, $this->priceCodes)) {
            return $this->priceCodes[$id];
        }

        return null;
    }
}
