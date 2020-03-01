<?php


namespace AxisCare\Model;

/**
 * Class RateProfile
 * @package AxisCare\Model
 */
class RateProfile extends AbstractModel
{
    /** @var int */
    protected $id;

    /** @var int float */
    protected $baseRate = 0.00;

    /** @var float */
    protected $rate = 1.00;

    /** @var int */
    protected $rateThreshold = 1;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return float
     */
    public function getBaseRate(): float
    {
        return $this->baseRate;
    }

    /**
     * @param float $baseRate
     * @return $this
     */
    public function setBaseRate(float $baseRate): self
    {
        $this->baseRate = $baseRate;
        return $this;
    }

    /**
     * @return float
     */
    public function getRate(): float
    {
        return $this->rate;
    }

    /**
     * @param float $rate
     * @return $this
     */
    public function setRate(float $rate): self
    {
        $this->rate = $rate;
        return $this;
    }

    /**
     * @return int
     */
    public function getRateThreshold(): int
    {
        return $this->rateThreshold;
    }

    /**
     * @param int $rateThreshold
     * @return $this
     */
    public function setRateThreshold(int $rateThreshold): self
    {
        $this->rateThreshold = $rateThreshold;
        return $this;
    }
}
