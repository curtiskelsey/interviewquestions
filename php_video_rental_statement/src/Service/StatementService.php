<?php


namespace AxisCare\Service;

use AxisCare\Model\Customer;
use AxisCare\Model\Statement;

/**
 * Handles the generation of statements
 *
 * Class StatementService
 * @package AxisCare
 */
class StatementService
{
    use RentalServiceAwareTrait;

    public function __construct(RentalService $rentalService)
    {
        $this->rentalService = $rentalService;
    }

    /**
     * Given a customer, a statement is created and returned
     *
     * @param Customer $customer
     * @return Statement
     */
    public function generate(Customer $customer): Statement
    {
        $statement = new Statement($customer);

        $statement->setHeading($customer->getName());

        // determine amounts for each line
        foreach ($customer->getRentals() as $rental) {
            $rentalAmount = $this->getRentalService()->getTotal($rental);

            // add frequent renter points
            $statement->addFrequentRenterPoints(1);

            $movie = $rental->getMovie();
            $priceCode = $movie->getPriceCode();

            // add bonus frequent renter points
            if ($rental->getDaysRented() > $priceCode->getBonusFrequentRenterPointsThreshold()) {
                $statement->addFrequentRenterPoints($priceCode->getBonusFrequentRenterPoints());
            }

            $statement->addLineItem(
                $movie->getTitle(),
                $rentalAmount
            );

            $statement->addToTotal($rentalAmount);
        }

        return $statement;
    }
}
