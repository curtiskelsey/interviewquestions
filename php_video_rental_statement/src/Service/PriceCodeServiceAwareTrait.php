<?php

namespace AxisCare\Service;

/**
 * Class PriceCodeServiceAwareTrait
 * @package AxisCare
 * @codeCoverageIgnore
 */
trait PriceCodeServiceAwareTrait
{
    /** @var  PriceCodeService */
    protected $priceCodeService;

    /**
     * @return PriceCodeService
     */
    public function getPriceCodeService(): PriceCodeService
    {
        return $this->priceCodeService;
    }

    /**
     * @param PriceCodeService $priceCodeService
     * @return $this
     */
    public function setPriceCodeService(PriceCodeService $priceCodeService): self
    {
        $this->priceCodeService = $priceCodeService;
        return $this;
    }
}
