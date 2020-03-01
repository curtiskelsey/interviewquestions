<?php


namespace AxisCare\Service;

use AxisCare\Model\Rental;

/**
 * Class RentalService
 * @package AxisCare\Service
 */
class RentalService
{
    /**
     * Given a rental, returns the total cost of the rental
     *
     * @param Rental $rental
     * @return float
     */
    public function getTotal(Rental $rental): float
    {
        $movie = $rental->getMovie();
        $classification = $movie->getMovieClassification();
        $rateProfile = $classification->getRateProfile();

        $amount = $rateProfile->getBaseRate();

        $chargeableDays = $rental->getDaysRented() - $rateProfile->getRateThreshold();

        if ($chargeableDays < 0) {
            $chargeableDays = 0;
        }

        $amount += ($chargeableDays * $rateProfile->getRate());

        return $amount;
    }
}
