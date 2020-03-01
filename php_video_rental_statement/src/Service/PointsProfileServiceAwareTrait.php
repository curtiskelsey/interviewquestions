<?php

namespace AxisCare\Service;

/**
 * Class PointsProfileServiceAwareTrait
 * @package AxisCare\Service
 */
trait PointsProfileServiceAwareTrait
{
    /** @var  PointsProfileService */
    protected $pointsProfileService;

    /**
     * @return PointsProfileService
     */
    public function getPointsProfileService(): PointsProfileService
    {
        return $this->pointsProfileService;
    }

    /**
     * @param PointsProfileService $pointsProfileService
     * @return $this
     */
    public function setPointsProfileService(PointsProfileService $pointsProfileService): self
    {
        $this->pointsProfileService = $pointsProfileService;
        return $this;
    }
}
