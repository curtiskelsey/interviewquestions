<?php

namespace AxisCare\Model;

use AxisCare\ArraySerializableInterface;
use AxisCare\ArraySerializableTrait;
use AxisCare\AuditableInterface;
use AxisCare\AuditableTrait;
use Carbon\Carbon;

/**
 * Class Customer
 * @package AxisCare\Model
 * @codeCoverageIgnore
 */
class Customer implements
    ArraySerializableInterface,
    AuditableInterface
{
    use ArraySerializableTrait,
        AuditableTrait;

    /** @var string */
    private $name;

    /** @var Rental[]  */
    private $rentals = [];

    public function __construct($data = null)
    {
        $this->created = Carbon::now();
        $this->lastModified = Carbon::now();

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
