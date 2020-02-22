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
        if ($type === self::HTML_TYPE) {
            return $this->generateHtml($customer);
        }

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

    private function generateHtml(Customer $customer): string
    {
        $totalAmount = 0;
        $frequentRenterPoints = 0;
        $result = sprintf(
            '<h1 class="header">Rentals for <span class="customer-name">%s</span></h1>',
            $customer->getName()
        );

        $result .= '<ul class="rental-list">';

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

            $result .= sprintf(
                '<li class="rental-item">%s: %s</li>',
                $rental->getMovie()->getTitle(),
                $thisAmount
            );

            $totalAmount += $thisAmount;
        }

        $result .= '</ul>';

        // add footer lines
        $result .= sprintf(
            '<p>Amount owed is <span class="total">%s</span></p>',
            $totalAmount
        );

        $result .= sprintf(
            '<p>You earned <span class="total">%s</span> frequent renter points</p>',
            $frequentRenterPoints
        );

        return $result;
    }
}
