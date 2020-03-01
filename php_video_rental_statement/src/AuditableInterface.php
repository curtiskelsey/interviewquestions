<?php


namespace AxisCare;

use Carbon\Carbon;

/**
 * Interface AuditableInterface
 * @package AxisCare
 */
interface AuditableInterface
{
    /**
     * Returns the date and time the record was created
     *
     * @return Carbon
     */
    public function getCreated(): Carbon;

    /**
     * Returns the date and time the record was last modified
     *
     * @return Carbon
     */
    public function getLastModified(): Carbon;
}
