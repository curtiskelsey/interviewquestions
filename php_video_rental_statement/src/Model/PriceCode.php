<?php


namespace AxisCare\Model;

/**
 * Class PriceCode
 * @package AxisCare
 * @codeCoverageIgnore
 */
class PriceCode extends AbstractModel
{
    public const CHILDRENS = 2;
    public const REGULAR = 0;
    public const NEW_RELEASE = 1;

    /** @var int */
    protected $id;

    /** @var string */
    protected $name;

    /** @var float */
    protected $priceMultiplier = 1;

    /** @var int */
    protected $daysRentedThreshold = 1;

    /** @var int */
    protected $bonusFrequentRenterPoints = 0;

    /** @var int */
    protected $bonusFrequentRenterPointsThreshold = 1;

    /** @var float */
    protected $flatRate = 0;

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

    /**
     * @return int
     */
    public function getBonusFrequentRenterPoints(): int
    {
        return $this->bonusFrequentRenterPoints;
    }

    /**
     * @param int $bonusFrequentRenterPoints
     * @return $this
     */
    public function setBonusFrequentRenterPoints(int $bonusFrequentRenterPoints): self
    {
        $this->bonusFrequentRenterPoints = $bonusFrequentRenterPoints;
        return $this;
    }

    /**
     * @return int
     */
    public function getBonusFrequentRenterPointsThreshold(): int
    {
        return $this->bonusFrequentRenterPointsThreshold;
    }

    /**
     * @param int $bonusFrequentRenterPointsThreshold
     * @return $this
     */
    public function setBonusFrequentRenterPointsThreshold(int $bonusFrequentRenterPointsThreshold): self
    {
        $this->bonusFrequentRenterPointsThreshold = $bonusFrequentRenterPointsThreshold;
        return $this;
    }
}
