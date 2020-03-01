<?php


namespace AxisCareTest;

use AxisCare\Model\PointsProfile;
use AxisCare\Option\AxisCareOptions;
use AxisCare\Service\PointsProfileService;
use PHPUnit\Framework\TestCase;

/**
 * Class PointsProfileServiceTest
 * @package AxisCareTest
 */
class PointsProfileServiceTest extends TestCase
{
    public function testFetchAll(): void
    {
        $service = new PointsProfileService(AxisCareOptions::create());

        $pointsProfiles = $service->fetchAll();

        foreach ($pointsProfiles as $pointsProfile) {
            $this->assertInstanceOf(PointsProfile::class, $pointsProfile);
        }
    }

    public function testFetch(): void
    {
        $service = new PointsProfileService(AxisCareOptions::create());

        $pointsProfile = $service->fetch(1);

        $this->assertInstanceOf(PointsProfile::class, $pointsProfile);
    }
}
