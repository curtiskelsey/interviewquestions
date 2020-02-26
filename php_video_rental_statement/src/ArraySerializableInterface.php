<?php


namespace AxisCare;


interface ArraySerializableInterface
{
    /**
     * Hydrates $this with data from an array
     *
     * @param array $data
     * @return $this
     */
    public function fromArray(array $data);

    /**
     * Returns $this as an array
     *
     * @return array
     */
    public function toArray(): array;
}
