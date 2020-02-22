<?php


namespace AxisCare;

/**
 * Class PriceCode
 * @package AxisCare
 */
class PriceCode
{
    public const CHILDRENS = 2;
    public const REGULAR = 0;
    public const NEW_RELEASE = 1;

    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var int */
    private $priceMultiplier = 1;

    /** @var int */
    private $daysRentedThreshold = 1;

    public function __construct(int $id, string $name, int $priceMultiplier = 1, int $daysRentedThreshold = 1)
    {
        $this->id = $id;
        $this->name = $name;
        $this->daysRentedThreshold = $daysRentedThreshold;
        $this->priceMultiplier = $priceMultiplier;
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
