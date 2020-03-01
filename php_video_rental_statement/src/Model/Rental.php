<?php

namespace AxisCare\Model;

use AxisCare\ArraySerializableInterface;
use AxisCare\ArraySerializableTrait;
use AxisCare\AuditableInterface;
use AxisCare\AuditableTrait;
use Carbon\Carbon;

/**
 * Class Rental
 * @package AxisCare\Model
 * @codeCoverageIgnore
 */
class Rental implements
    ArraySerializableInterface,
    AuditableInterface
{
    use ArraySerializableTrait,
        AuditableTrait;

    /** @var Movie  */
    private $movie;

    /** @var int  */
    private $daysRented;

    /** @var Carbon */
    private $firstDay;

    public function __construct($data = null)
    {
        $this->created = Carbon::now();
        $this->lastModified = Carbon::now();

        if (is_array($data)) {
            $this->fromArray($data);
        }
    }

    /**
     * @return int
     */
    public function getDaysRented(): int
    {
        return $this->daysRented;
    }

    /**
     * @param int $daysRented
     * @return $this
     */
    public function setDaysRented(int $daysRented): self
    {
        $this->daysRented = $daysRented;
        return $this;
    }

    /**
     * @return Movie
     */
    public function getMovie(): Movie
    {
        return $this->movie;
    }

    /**
     * @param Movie $movie
     * @return $this
     */
    public function setMovie(Movie $movie): self
    {
        $this->movie = $movie;
        return $this;
    }

    /**
     * @return Carbon
     */
    public function getFirstDay(): Carbon
    {
        return $this->firstDay;
    }

    /**
     * @param Carbon $firstDay
     * @return $this
     */
    public function setFirstDay(Carbon $firstDay): self
    {
        $this->firstDay = $firstDay;
        return $this;
    }
}
