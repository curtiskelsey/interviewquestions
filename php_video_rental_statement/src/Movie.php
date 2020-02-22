<?php

namespace AxisCare;

class Movie
{
    /** @var string string */
    private $title;

    /** @var PriceCode */
    private $priceCode;

    public function __construct(string $title, PriceCode $priceCode)
    {
        $this->title = $title;
        $this->priceCode = $priceCode;
    }

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
}
