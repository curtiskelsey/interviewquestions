<?php


namespace AxisCareTest;

use AxisCare\Model\MovieClassification;
use AxisCare\Model\PointsProfile;
use AxisCare\Model\RateProfile;
use AxisCare\Option\AxisCareOptions;
use AxisCare\Service\MovieClassificationService;
use AxisCare\Service\PointsProfileService;
use AxisCare\Service\RateProfileService;
use PHPUnit\Framework\TestCase;

/**
 * Class MovieClassificationServiceTest
 * @package AxisCareTest
 */
class MovieClassificationServiceTest extends TestCase
{
    public function testFetchAll(): void
    {
        $options = AxisCareOptions::create();
        $service = new MovieClassificationService(
            $options,
            new PointsProfileService($options),
            new RateProfileService($options)
        );

        $movieClassifications = $service->fetchAll();

        foreach ($movieClassifications as $movieClassification) {
            $this->assertInstanceOf(MovieClassification::class, $movieClassification);
            $this->assertInstanceOf(RateProfile::class, $movieClassification->getRateProfile());
            $this->assertInstanceOf(PointsProfile::class, $movieClassification->getPointsProfile());
        }
    }

    public function testFetch(): void
    {
        $options = AxisCareOptions::create();
        $service = new MovieClassificationService(
            $options,
            new PointsProfileService($options),
            new RateProfileService($options)
        );

        $movieClassification = $service->fetch(1);

        $this->assertInstanceOf(MovieClassification::class, $movieClassification);
        $this->assertInstanceOf(RateProfile::class, $movieClassification->getRateProfile());
        $this->assertInstanceOf(PointsProfile::class, $movieClassification->getPointsProfile());
    }
}
