<?php

namespace AxisCare\Model;

/**
 * Class Movie
 * @package AxisCare\Model
 * @codeCoverageIgnore
 */
class Movie extends AbstractModel
{
    /** @var string string */
    protected $title;

    /** @var MovieClassification */
    protected $movieClassification;

    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return MovieClassification
     */
    public function getMovieClassification(): MovieClassification
    {
        return $this->movieClassification;
    }

    /**
     * @param MovieClassification $movieClassification
     * @return $this
     */
    public function setMovieClassification(MovieClassification $movieClassification): self
    {
        $this->movieClassification = $movieClassification;
        return $this;
    }
}
