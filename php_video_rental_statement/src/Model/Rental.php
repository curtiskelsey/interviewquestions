<?php

namespace AxisCare\Model;

use Carbon\Carbon;

/**
 * Class Rental
 * @package AxisCare\Model
 * @codeCoverageIgnore
 */
class Rental extends AbstractModel
{
    /** @var Movie */
    protected $movie;

    /** @var int */
    protected $daysRented;

    /** @var Carbon */
    protected $firstDay;

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
