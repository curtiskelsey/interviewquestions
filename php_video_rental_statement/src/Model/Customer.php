<?php

namespace AxisCare\Model;

/**
 * Class Customer
 * @package AxisCare\Model
 * @codeCoverageIgnore
 */
class Customer extends AbstractModel
{
    /** @var string */
    protected $name;

    /** @var Rental[] */
    protected $rentals = [];

    public function addRental(Rental $rental): self
    {
        array_push($this->rentals, $rental);
        return $this;
    }

    /**
     * @return Rental[]
     */
    public function getRentals(): array
    {
        return $this->rentals;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
}
