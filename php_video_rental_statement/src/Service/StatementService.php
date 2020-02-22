<?php


namespace AxisCare\Service;

use AxisCare\Customer;
use AxisCare\PriceCode;
use AxisCare\Rental;

/**
 * Class StatementService
 * @package AxisCare
 */
class StatementService
{
    use PriceCodeServiceAwareTrait;

    public const PLAINTEXT_TYPE = 0;
    public const HTML_TYPE = 1;

    public function __construct(PriceCodeService $priceCodeService)
    {
        $this->priceCodeService = $priceCodeService;
    }

    public function getRentalAmount(Rental $rental): float
    {
        $movie = $rental->getMovie();
        $priceCode = $movie->getPriceCode();

        $amount = $priceCode->getFlatRate();

        $chargeableDays = $rental->getDaysRented() - $priceCode->getDaysRentedThreshold();

        if ($chargeableDays < 0) {
            $chargeableDays = 0;
        }

        $amount += ($chargeableDays * $priceCode->getPriceMultiplier());

        return $amount;
    }

    public function generate(Customer $customer, int $type = self::PLAINTEXT_TYPE): string
    {
        $totalAmount = 0;
        $frequentRenterPoints = 0;
        $result = "Rental Record for " . $customer->getName() . "\n";

        // determine amounts for each line
        foreach ($customer->getRentals() as $rental) {
            $thisAmount = $this->getRentalAmount($rental);

            // add frequent renter points
            $frequentRenterPoints++;

            // add bonus for a two day new release rental
            if ($rental->getMovie()->getPriceCode()->getId() === PriceCode::NEW_RELEASE
                && $rental->getDaysRented() > 1
            ) {
                $frequentRenterPoints++;
            }

            // show figures for this rental
            $result .= "\t" . $rental->getMovie()->getTitle() . "\t" .
                $thisAmount . "\n";
            $totalAmount += $thisAmount;
        }

        // add footer lines
        $result .= "Amount owed is " . $totalAmount . "\n";
        $result .= "You earned " . $frequentRenterPoints .
            " frequent renter points";

        return $result;
    }
}
