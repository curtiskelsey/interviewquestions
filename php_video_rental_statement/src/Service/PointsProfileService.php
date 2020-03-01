<?php


namespace AxisCare\Service;

use AxisCare\Model\PointsProfile;

/**
 * Class PointsProfileService
 * @package AxisCare\Service
 * @property PointsProfile[] $cache
 * @method PointsProfile|null fetch(int $id)
 */
class PointsProfileService extends AbstractDataProvider
{
    /**
     * @return PointsProfile[]
     */
    public function fetchAll(): array
    {
        if ($this->cache) {
            return $this->cache;
        }

        foreach ($this->getAxisCareOptions()->getPointsProfiles() as $pointsProfile) {
            $this->cache[$pointsProfile['id']] = new PointsProfile(
                $pointsProfile
            );
        }

        return $this->cache;
    }
}
