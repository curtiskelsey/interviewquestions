<?php


namespace AxisCareTest;

use AxisCare\Model\RateProfile;
use AxisCare\Option\AxisCareOptions;
use AxisCare\Service\RateProfileService;
use PHPUnit\Framework\TestCase;

/**
 * Class RateProfileServiceTest
 * @package AxisCareTest
 */
class RateProfileServiceTest extends TestCase
{
    public function testFetchAll(): void
    {
        $service = new RateProfileService(AxisCareOptions::create());

        $rateProfiles = $service->fetchAll();

        foreach ($rateProfiles as $rateProfile) {
            $this->assertInstanceOf(RateProfile::class, $rateProfile);
        }
    }

    public function testFetch(): void
    {
        $service = new RateProfileService(AxisCareOptions::create());

        $rateProfile = $service->fetch(1);

        $this->assertInstanceOf(RateProfile::class, $rateProfile);
    }
}
