<?php


namespace AxisCare\Service;

use AxisCare\DataProviderInterface;
use AxisCare\Option\AxisCareOptions;
use AxisCare\Option\AxisCareOptionsAwareTrait;

/**
 * Abstract Class AbstractDataProvider
 * @package AxisCare\Service
 */
abstract class AbstractDataProvider implements DataProviderInterface
{
    use AxisCareOptionsAwareTrait;

    protected $cache = [];

    public function __construct(AxisCareOptions $axisCareOptions)
    {
        $this->axisCareOptions = $axisCareOptions;
    }

    public function fetch(int $id)
    {
        if (!$this->cache) {
            $this->fetchAll();
        }

        if (array_key_exists($id, $this->cache)) {
            return $this->cache[$id];
        }

        return null;
    }
}
