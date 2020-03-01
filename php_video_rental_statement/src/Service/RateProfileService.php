<?php


namespace AxisCare\Service;

use AxisCare\Model\RateProfile;

/**
 * Class RateProfileService
 * @package AxisCare\Service
 * @method RateProfile|null fetch(int $id)
 */
class RateProfileService extends AbstractDataProvider
{
    /**
     * @return RateProfile[]
     */
    public function fetchAll(): array
    {
        if ($this->cache) {
            return $this->cache;
        }

        foreach ($this->getAxisCareOptions()->getRateProfiles() as $rateProfile) {
            $this->cache[$rateProfile['id']] = new RateProfile(
                $rateProfile
            );
        }

        return $this->cache;
    }
}
