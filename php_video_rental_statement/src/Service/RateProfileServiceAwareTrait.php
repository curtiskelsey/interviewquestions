<?php

namespace AxisCare\Service;

/**
 * Class RateProfileServiceAwareTrait
 * @package AxisCare\Service
 * @codeCoverageIgnore
 */
trait RateProfileServiceAwareTrait
{
    /** @var  RateProfileService */
    protected $rateProfileService;

    /**
     * @return RateProfileService
     */
    public function getRateProfileService(): RateProfileService
    {
        return $this->rateProfileService;
    }

    /**
     * @param RateProfileService $rateProfileService
     * @return $this
     */
    public function setRateProfileService(RateProfileService $rateProfileService): self
    {
        $this->rateProfileService = $rateProfileService;
        return $this;
    }
}
