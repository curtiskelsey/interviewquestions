<?php

namespace AxisCare\Option;

/**
 * Class AxisCareOptionsAwareTrait
 * @package AxisCare\Option
 */
trait AxisCareOptionsAwareTrait
{
    /** @var  AxisCareOptions */
    protected $axisCareOptions;

    /**
     * @return AxisCareOptions
     */
    public function getAxisCareOptions(): AxisCareOptions
    {
        return $this->axisCareOptions;
    }

    /**
     * @param AxisCareOptions $axisCareOptions
     * @return $this
     */
    public function setAxisCareOptions(AxisCareOptions $axisCareOptions): self
    {
        $this->axisCareOptions = $axisCareOptions;
        return $this;
    }
}
