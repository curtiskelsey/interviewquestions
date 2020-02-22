<?php

namespace AxisCare\Service;

/**
 * Class StatementServiceAwareTrait
 * @package AxisCare
 */
trait StatementServiceAwareTrait
{
    /** @var  StatementService */
    protected $statementService;

    /**
     * @return StatementService
     */
    public function getStatementService(): StatementService
    {
        return $this->statementService;
    }

    /**
     * @param StatementService $statementService
     * @return $this
     */
    public function setStatementService(StatementService $statementService): self
    {
        $this->statementService = $statementService;
        return $this;
    }
}
