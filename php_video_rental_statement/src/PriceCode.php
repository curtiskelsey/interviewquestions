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

    /** @var float */
    private $priceMultiplier = 1;

    /** @var int */
    private $daysRentedThreshold = 1;

    /** @var float  */
    private $flatRate = 0;

    public function __construct(int $id, string $name, float $priceMultiplier = 1, int $daysRentedThreshold = 1, float $flatRate = 0)
    {
        $this->id = $id;
        $this->name = $name;
        $this->daysRentedThreshold = $daysRentedThreshold;
        $this->priceMultiplier = $priceMultiplier;
        $this->flatRate = $flatRate;
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
     * @return float
     */
    public function getPriceMultiplier(): float
    {
        return $this->priceMultiplier;
    }

    /**
     * @param float $priceMultiplier
     */
    public function setPriceMultiplier(float $priceMultiplier): void
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

    /**
     * @return float
     */
    public function getFlatRate(): float
    {
        return $this->flatRate;
    }

    /**
     * @param float $flatRate
     */
    public function setFlatRate(float $flatRate): void
    {
        $this->flatRate = $flatRate;
    }
}
