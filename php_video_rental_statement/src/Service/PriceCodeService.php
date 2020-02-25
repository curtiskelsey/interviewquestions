<?php


namespace AxisCare\Service;

use AxisCare\Model\PriceCode;

/**
 * Class PriceCodeService
 * @package AxisCare
 */
class PriceCodeService
{
    use ConfigAwareTrait;

    /** @var PriceCode[] */
    private $priceCodes = [];

    public function __construct()
    {
        $this->config = include __DIR__ . '/../../config/local.php';
    }

    /**
     * @return PriceCode[]
     */
    public function fetchAll(): array
    {
        if ($this->priceCodes) {
            return $this->priceCodes;
        }

        if (!array_key_exists('priceCodes', $this->config)) {
            return [];
        }

        foreach ($this->config['priceCodes'] as $priceCodeConfig) {
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
