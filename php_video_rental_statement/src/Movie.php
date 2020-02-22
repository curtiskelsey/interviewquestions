<?php

namespace AxisCare;

class Movie
{
    /** @var string string */
    private $title;

    /** @var int */
    private $priceCode;

    public function __construct(string $title, int $priceCode)
    {
        $this->title = $title;
        $this->priceCode = $priceCode;
    }

    public function getPriceCode(): int
    {
        return $this->priceCode;
    }

    public function setPriceCode(int $priceCode)
    {
        $this->priceCode = $priceCode;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
