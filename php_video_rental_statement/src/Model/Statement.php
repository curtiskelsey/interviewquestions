<?php


namespace AxisCare\Model;

/**
 * Class Statement
 * @package AxisCare
 */
class Statement
{
    /**
     * @var float
     */
    private $total = 0;

    /**
     * @var float[]
     */
    private $lineItems = [];

    /**
     * @var int
     */
    private $frequentRenterPoints = 0;

    /**
     * @var Customer
     */
    private $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function addToTotal(float $amount): self
    {
        $this->total += $amount;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @param float $total
     */
    public function setTotal(float $total): void
    {
        $this->total = $total;
    }

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

    /**
     * @return float[]
     */
    public function getLineItems(): array
    {
        return $this->lineItems;
    }

    /**
     * @param string $text
     * @param float $amount
     * @return $this
     */
    public function addLineItem(string $text, float $amount): self
    {
        $this->lineItems[$text] = $amount;

        return $this;
    }
}
