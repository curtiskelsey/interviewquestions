<?php


namespace AxisCare;


use Carbon\Carbon;

trait AuditableTrait
{
    /**
     * @var Carbon
     */
    protected $created;

    /**
     * @var Carbon
     */
    protected $lastModified;

    /**
     * @return Carbon
     */
    public function getCreated(): Carbon
    {
        return $this->created;
    }

    /**
     * @param Carbon $created
     * @return $this
     */
    public function setCreated(Carbon $created): self
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return Carbon
     */
    public function getLastModified(): Carbon
    {
        return $this->lastModified;
    }

    /**
     * @param Carbon $lastModified
     * @return $this
     */
    public function setLastModified(Carbon $lastModified): self
    {
        $this->lastModified = $lastModified;
        return $this;
    }
}
