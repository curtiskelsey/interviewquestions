<?php


namespace AxisCare\Model;

use AxisCare\ReportInterface;

/**
 * Class AbstractReport
 * @package AxisCare\Model
 */
abstract class AbstractReport implements ReportInterface
{
    /**
     * @var string
     */
    protected $heading;

    /**
     * @var array
     */
    protected $lineItems = [];

    /**
     * @var float
     */
    protected $total = 0;

    /**
     * @return string
     */
    public function getHeading(): string
    {
        return $this->heading;
    }

    /**
     * @param string $heading
     * @return $this
     */
    public function setHeading(string $heading): self
    {
        $this->heading = $heading;
        return $this;
    }

    /**
     * @return array
     */
    public function getLineItems(): array
    {
        return $this->lineItems;
    }

    /**
     * @param array $lineItems
     * @return $this
     */
    public function setLineItems(array $lineItems): self
    {
        $this->lineItems = $lineItems;
        return $this;
    }

    /**
     * @param string $text
     * @param float $amount
     * @return $this
     */
    public function addLineItem(string $text, float $amount): self
    {
        $this->lineItems[$text] = $amount;

        return $this;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @param float $total
     * @return $this
     */
    public function setTotal(float $total): self
    {
        $this->total = $total;
        return $this;
    }

    public function addToTotal(float $amount): self
    {
        $this->total += $amount;
        return $this;
    }
}
