<?php


namespace AxisCare\Model;

/**
 * Class PointsProfile
 * @package AxisCare\Model
 */
class PointsProfile extends AbstractModel
{
    /** @var int */
    protected $id;

    /** @var int  */
    protected $basePoints = 1;

    /** @var int  */
    protected $bonusPoints = 0;

    /** @var int  */
    protected $bonusPointsThreshold = 1;

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
     * @return int
     */
    public function getBasePoints(): int
    {
        return $this->basePoints;
    }

    /**
     * @param int $basePoints
     * @return $this
     */
    public function setBasePoints(int $basePoints): self
    {
        $this->basePoints = $basePoints;
        return $this;
    }

    /**
     * @return int
     */
    public function getBonusPoints(): int
    {
        return $this->bonusPoints;
    }

    /**
     * @param int $bonusPoints
     * @return $this
     */
    public function setBonusPoints(int $bonusPoints): self
    {
        $this->bonusPoints = $bonusPoints;
        return $this;
    }

    /**
     * @return int
     */
    public function getBonusPointsThreshold(): int
    {
        return $this->bonusPointsThreshold;
    }

    /**
     * @param int $bonusPointsThreshold
     * @return $this
     */
    public function setBonusPointsThreshold(int $bonusPointsThreshold): self
    {
        $this->bonusPointsThreshold = $bonusPointsThreshold;
        return $this;
    }
}
