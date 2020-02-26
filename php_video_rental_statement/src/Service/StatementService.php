<?php


namespace AxisCare\Service;

use AxisCare\Model\Customer;
use AxisCare\Model\Statement;

/**
 * Class StatementService
 * @package AxisCare
 */
class StatementService
{
    use RentalServiceAwareTrait;

    public const PLAINTEXT_FORMAT = 0;
    public const HTML_FORMAT = 1;

    public function __construct(RentalService $rentalService)
    {
        $this->rentalService = $rentalService;
    }

    /**
     * Renders a given statement in the format provided. If no format is provided, it is rendered in plain text
     *
     * @param Statement $statement
     * @param int $format
     * @return string
     */
    public function render(Statement $statement, int $format = self::PLAINTEXT_FORMAT): string
    {
        switch ($format) {
            case self::HTML_FORMAT:
                return $this->renderHtml($statement);
                break;
            default:
                return $this->renderPlainText($statement);
                break;
        }
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
                $rental->getMovie()->getTitle(),
                $rentalAmount
            );

            $statement->addToTotal($rentalAmount);
        }

        return $statement;
    }

    /**
     * Given a statement, a plain text rendering of the statement is created and returned
     *
     * @param Statement $statement
     * @return string
     */
    public function renderPlainText(Statement $statement): string
    {
        $customer = $statement->getCustomer();

        $result = sprintf(
            "Rental Record for %s\n",
            $customer->getName()
        );

        foreach ($statement->getLineItems() as $text => $value) {
            $result .= sprintf(
                "\t%s\t%s\n",
                $text,
                number_format($value, 0)
            );
        }

        // add footer lines
        $result .= sprintf(
            "Amount owed is %s\nYou earned %d frequent renter points",
            number_format($statement->getTotal(), 0),
            $statement->getFrequentRenterPoints()
        );

        return $result;
    }

    /**
     * Given a statement, a HTML rendering of the statement is created and returned
     *
     * @param Statement $statement
     * @return string
     */
    private function renderHtml(Statement $statement): string
    {
        $customer = $statement->getCustomer();

        $result = sprintf(
            '<h1 class="header">Rentals for <span class="customer-name">%s</span></h1>',
            $customer->getName()
        );

        $result .= '<ul class="rental-list">';

        foreach ($statement->getLineItems() as $text => $value) {
            $result .= sprintf(
                '<li class="rental-item">%s: %s</li>',
                $text,
                $value
            );
        }

        $result .= '</ul>';

        $result .= sprintf(
            '<p>Amount owed is <span class="total">%s</span></p>',
            $statement->getTotal()
        );

        $result .= sprintf(
            '<p>You earned <span class="total">%s</span> frequent renter points</p>',
            $statement->getFrequentRenterPoints()
        );

        return $result;
    }
}
