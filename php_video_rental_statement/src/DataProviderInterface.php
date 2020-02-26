<?php


namespace AxisCare;

/**
 * Interface DataProviderInterface
 * @package AxisCare
 */
interface DataProviderInterface
{
    /**
     * Retrieves a single record
     *
     * @param int $id
     * @return mixed
     */
    public function fetch(int $id);

    /**
     * Retrieves a complete data set
     *
     * @return mixed
     */
    public function fetchAll();
}
