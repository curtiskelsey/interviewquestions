<?php


namespace AxisCare\Model;

use AxisCare\ArraySerializableInterface;
use AxisCare\ArraySerializableTrait;
use AxisCare\AuditableInterface;
use AxisCare\AuditableTrait;
use Carbon\Carbon;

/**
 * Class Statement
 * @package AxisCare
 * @codeCoverageIgnore
 */
class Statement extends AbstractReport implements
    ArraySerializableInterface,
    AuditableInterface
{
    use ArraySerializableTrait,
        AuditableTrait;

    /**
     * @var int
     */
    private $frequentRenterPoints = 0;

    /**
     * @var Customer
     */
    private $customer;

    public function __construct($data = null)
    {
        $this->created = Carbon::now();
        $this->lastModified = Carbon::now();

        if ($data instanceof Customer) {
            $this->customer = $data;
        }

        if (is_array($data)) {
            $this->fromArray($data);
        }
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
}
