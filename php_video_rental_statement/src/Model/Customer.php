<?php

namespace AxisCare\Model;

use AxisCare\ArraySerializableInterface;
use AxisCare\ArraySerializableTrait;

class Customer implements
    ArraySerializableInterface
{
    use ArraySerializableTrait;

    /** @var string */
    private $name;

    /** @var Rental[]  */
    private $rentals = [];

    public function __construct($data = null)
    {
        if (is_string($data)) {
            $this->name = $data;
        }

        if (is_array($data)) {
            $this->fromArray($data);
        }
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
