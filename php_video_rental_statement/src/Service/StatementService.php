<?php


namespace AxisCare\Service;

use AxisCare\Customer;
use AxisCare\PriceCode;

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

    public function generate(Customer $customer, int $type = self::PLAINTEXT_TYPE): string
    {
        $totalAmount = 0;
        $frequentRenterPoints = 0;
        $result = "Rental Record for " . $customer->getName() . "\n";

        // determine amounts for each line
        foreach ($customer->getRentals() as $rental) {
            $thisAmount = 0;

            switch ($rental->getMovie()->getPriceCode()->getId()) {
                case PriceCode::REGULAR:
                    $thisAmount += 2;
                    if($rental->getDaysRented() > 2)
                        $thisAmount += ($rental->getDaysRented() - 2) * 1.5;
                    break;
                case PriceCode::NEW_RELEASE:
                    $thisAmount += $rental->getDaysRented() * 3;
                    break;
                case PriceCode::CHILDRENS:
                    $thisAmount += 1.5;
                    if($rental->getDaysRented() > 3)
                        $thisAmount += ($rental->getDaysRented() - 3) *1.5;
                    break;
            }

            // add frequent renter points
            $frequentRenterPoints++;

            // add bonus for a two day new release rental
            if (($rental->getMovie()->getPriceCode()->getId() == PriceCode::NEW_RELEASE) &&
                $rental->getDaysRented() > 1) $frequentRenterPoints++;

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
