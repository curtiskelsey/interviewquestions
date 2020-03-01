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

    /** @var PriceCode */
    protected $priceCode;

    public function getPriceCode(): PriceCode
    {
        return $this->priceCode;
    }

    public function setPriceCode(PriceCode $priceCode)
    {
        $this->priceCode = $priceCode;
    }

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
}
