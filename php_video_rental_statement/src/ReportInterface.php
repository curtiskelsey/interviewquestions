<?php


namespace AxisCare;


interface ReportInterface
{
    /**
     * Returns the heading of the report
     * @return string
     */
    public function getHeading(): string;

    /**
     * Returns an array of all report line items
     * @return array
     */
    public function getLineItems(): array;

    /**
     * Returns the total for the line items
     * @return float
     */
    public function getTotal(): float;
}
