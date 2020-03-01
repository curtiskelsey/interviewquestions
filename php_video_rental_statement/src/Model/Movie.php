<?php

namespace AxisCare\Model;

use AxisCare\ArraySerializableInterface;
use AxisCare\ArraySerializableTrait;
use AxisCare\AuditableInterface;
use AxisCare\AuditableTrait;
use Carbon\Carbon;

/**
 * Class Movie
 * @package AxisCare\Model
 * @codeCoverageIgnore
 */
class Movie implements
    ArraySerializableInterface,
    AuditableInterface
{
    use ArraySerializableTrait,
        AuditableTrait;

    /** @var string string */
    private $title;

    /** @var PriceCode */
    private $priceCode;

    public function __construct($data = null)
    {
        $this->created = Carbon::now();
        $this->lastModified = Carbon::now();

        if (is_array($data)) {
            $this->fromArray($data);
        }
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
