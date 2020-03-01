<?php


namespace AxisCareTest\View;

use AxisCare\MissingPluginException;
use AxisCare\Model\Statement;
use AxisCare\Option\AxisCareOptions;
use AxisCare\View\Renderer\StatementRenderer;
use AxisCare\View\ViewManager;
use PHPUnit\Framework\TestCase;

/**
 * Class ViewManagerTest
 * @package AxisCareTest\View
 */
class ViewManagerTest extends TestCase
{
    /**
     * @throws MissingPluginException
     */
    public function testRenderText(): void
    {
        $viewManager = new ViewManager(
            AxisCareOptions::create()
        );

        $result = $viewManager->get(Statement::class);

        $this->assertInstanceOf(StatementRenderer::class, $result);
    }
}
