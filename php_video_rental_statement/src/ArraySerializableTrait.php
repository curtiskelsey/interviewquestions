<?php


namespace AxisCare;


trait ArraySerializableTrait
{
    public function fromArray(array $data): self
    {
        $members = $this->toArray();

        foreach ($members as $name => $value) {
            if (array_key_exists($name, $data)) {
                $this->$name = $data[$name];
            }
        }

        return $this;
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
