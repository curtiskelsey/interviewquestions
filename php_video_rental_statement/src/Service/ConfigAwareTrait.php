<?php

namespace AxisCare\Service;

/**
 * Class ConfigAwareTrait
 * @package AxisCare
 * @codeCoverageIgnore
 */
trait ConfigAwareTrait
{
    /** @var  array */
    protected $config;

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * @param array $config
     * @return $this
     */
    public function setConfig(array $config): self
    {
        $this->config = $config;
        return $this;
    }
}
