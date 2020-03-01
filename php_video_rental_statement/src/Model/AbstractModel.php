<?php


namespace AxisCare\Model;

use AxisCare\ArraySerializableInterface;
use AxisCare\ArraySerializableTrait;
use AxisCare\AuditableInterface;
use AxisCare\AuditableTrait;
use Carbon\Carbon;

/**
 * Abstract Class AbstractModel
 * @package AxisCare\Model
 */
abstract class AbstractModel implements
    ArraySerializableInterface,
    AuditableInterface
{
    use ArraySerializableTrait,
        AuditableTrait;

    public function __construct(array $data = null)
    {
        $this->created = Carbon::now();
        $this->lastModified = Carbon::now();

        if ($data) {
            $this->fromArray($data);
        }
    }
}
