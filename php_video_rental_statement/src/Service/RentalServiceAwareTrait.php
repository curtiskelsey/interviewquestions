<?php

namespace AxisCare\Service;

/**
 * Class RentalServiceAwareTrait
 * @package AxisCare\Service
 * @codeCoverageIgnore
 */
trait RentalServiceAwareTrait
{
    /** @var  RentalService */
    protected $rentalService;

    /**
     * @return RentalService
     */
    public function getRentalService(): RentalService
    {
        return $this->rentalService;
    }

    /**
     * @param RentalService $rentalService
     * @return $this
     */
    public function setRentalService(RentalService $rentalService): self
    {
        $this->rentalService = $rentalService;
        return $this;
    }
}
