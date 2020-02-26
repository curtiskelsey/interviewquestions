<?php

namespace AxisCare\Model;

class Customer
{
    /** @var string */
    private $name;

    /** @var Rental[]  */
    private $rentals = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

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
}
