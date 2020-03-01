<?php


namespace AxisCare\Service;

use AxisCare\Model\MovieClassification;
use AxisCare\Option\AxisCareOptions;

/**
 * Class MovieClassificationService
 * @package AxisCare\Service
 * @property MovieClassification[] $cache
 * @method MovieClassification|null fetch(int $id)
 */
class MovieClassificationService extends AbstractDataProvider
{
    use PointsProfileServiceAwareTrait,
        RateProfileServiceAwareTrait;

    public function __construct(AxisCareOptions $axisCareOptions, PointsProfileService $pointsProfileService,
                                RateProfileService $rateProfileService)
    {
        parent::__construct($axisCareOptions);

        $this->pointsProfileService = $pointsProfileService;
        $this->rateProfileService = $rateProfileService;
    }

    /**
     * @return MovieClassification[]
     */
    public function fetchAll(): array
    {
        if ($this->cache) {
            return $this->cache;
        }

        foreach ($this->getAxisCareOptions()->getMovieClassifications() as $movieClassification) {
            if (isset($movieClassification['pointsProfile'])) {
                $movieClassification['pointsProfile'] = $this->getPointsProfileService()->fetch(
                    $movieClassification['pointsProfile']
                );
            }

            if (isset($movieClassification['rateProfile'])) {
                $movieClassification['rateProfile'] = $this->getRateProfileService()->fetch(
                    $movieClassification['rateProfile']
                );
            }

            $this->cache[$movieClassification['id']] = new MovieClassification(
                $movieClassification
            );
        }

        return $this->cache;
    }
}
