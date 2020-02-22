<?php


namespace AxisCare;

/**
 * Class PriceCode
 * @package AxisCare
 */
class PriceCode
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var int  */
    private $priceMultiplier = 1;

    /** @var int  */
    private $daysRentedThreshold = 1;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getPriceMultiplier(): int
    {
        return $this->priceMultiplier;
    }

    /**
     * @param int $priceMultiplier
     */
    public function setPriceMultiplier(int $priceMultiplier): void
    {
        $this->priceMultiplier = $priceMultiplier;
    }

    /**
     * @return int
     */
    public function getDaysRentedThreshold(): int
    {
        return $this->daysRentedThreshold;
    }

    /**
     * @param int $daysRentedThreshold
     */
    public function setDaysRentedThreshold(int $daysRentedThreshold): void
    {
        $this->daysRentedThreshold = $daysRentedThreshold;
    }
}
