<?php


namespace AxisCare\Model;

/**
 * Class MovieClassification
 * @package AxisCare\Model
 */
class MovieClassification extends AbstractModel
{
    public const CHILDRENS = 2;
    public const REGULAR = 0;
    public const NEW_RELEASE = 1;

    /** @var int */
    protected $id;

    /** @var string */
    protected $name;

    /** @var PointsProfile */
    protected $pointsProfile;

    /** @var RateProfile */
    protected $rateProfile;

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
     * @return string
     */
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

    /**
     * @return PointsProfile
     */
    public function getPointsProfile(): PointsProfile
    {
        return $this->pointsProfile;
    }

    /**
     * @param PointsProfile $pointsProfile
     * @return $this
     */
    public function setPointsProfile(PointsProfile $pointsProfile): self
    {
        $this->pointsProfile = $pointsProfile;
        return $this;
    }

    /**
     * @return RateProfile
     */
    public function getRateProfile(): RateProfile
    {
        return $this->rateProfile;
    }

    /**
     * @param RateProfile $rateProfile
     * @return $this
     */
    public function setRateProfile(RateProfile $rateProfile): self
    {
        $this->rateProfile = $rateProfile;
        return $this;
    }
}
