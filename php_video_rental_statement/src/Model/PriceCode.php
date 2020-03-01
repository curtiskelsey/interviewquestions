<?php


namespace AxisCare\Model;

use AxisCare\ArraySerializableInterface;
use AxisCare\ArraySerializableTrait;
use AxisCare\AuditableInterface;
use AxisCare\AuditableTrait;
use Carbon\Carbon;

/**
 * Class PriceCode
 * @package AxisCare
 * @codeCoverageIgnore
 */
class PriceCode implements
    ArraySerializableInterface,
    AuditableInterface
{
    use ArraySerializableTrait,
        AuditableTrait;

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

    /** @var int  */
    private $bonusFrequentRenterPoints = 0;

    /** @var int  */
    private $bonusFrequentRenterPointsThreshold = 1;

    /** @var float  */
    private $flatRate = 0;

    public function __construct(array $data = null)
    {
        $this->created = Carbon::now();
        $this->lastModified = Carbon::now();

        if ($data) {
            $this->fromArray($data);
        }
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
