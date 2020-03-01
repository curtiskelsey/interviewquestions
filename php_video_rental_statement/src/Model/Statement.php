<?php


namespace AxisCare\Model;

/**
 * Class Statement
 * @package AxisCare
 * @codeCoverageIgnore
 */
class Statement extends AbstractReport
{
    /**
     * @var int
     */
    protected $frequentRenterPoints = 0;

    /**
     * @var Customer
     */
    protected $customer;

    /**
     * @param int $amount
     * @return $this
     */
    public function addFrequentRenterPoints(int $amount = 1): self
    {
        $this->frequentRenterPoints += $amount;
        return $this;
    }

    /**
     * @return int
     */
    public function getFrequentRenterPoints(): int
    {
        return $this->frequentRenterPoints;
    }

    /**
     * @param int $frequentRenterPoints
     * @return $this
     */
    public function setFrequentRenterPoints(int $frequentRenterPoints): self
    {
        $this->frequentRenterPoints = $frequentRenterPoints;
        return $this;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     * @return $this
     */
    public function setCustomer(Customer $customer): self
    {
        $this->customer = $customer;
        return $this;
    }
}
