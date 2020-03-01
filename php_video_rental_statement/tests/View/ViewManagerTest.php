<?php


namespace AxisCareTest\View;

use AxisCare\Enumerable\MimeType;
use AxisCare\MissingPluginException;
use AxisCare\Model\Customer;
use AxisCare\Model\Statement;
use AxisCare\Option\AxisCareOptions;
use AxisCare\View\MissingMimeTypeException;
use AxisCare\View\Renderer\StatementRenderer;
use AxisCare\View\UnsupportedMimeTypeException;
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
    public function testGet(): void
    {
        $viewManager = new ViewManager(
            AxisCareOptions::create()
        );

        $result = $viewManager->get(Statement::class);

        $this->assertInstanceOf(StatementRenderer::class, $result);
    }

    /**
     * @throws MissingMimeTypeException
     * @throws MissingPluginException
     * @throws UnsupportedMimeTypeException
     */
    public function testRender(): void
    {
        $viewManager = new ViewManager(
            AxisCareOptions::create()
        );

        $result = $viewManager->render(
            new Statement(
                [
                    'customer' => new Customer(['name' => 'test']),
                    'heading' => 'test',
                ]
            ),
            MimeType::TEXT_PLAIN
        );

        $this->assertStringContainsString('<pre>', $result);
    }

    /**
     * @throws MissingPluginException
     * @throws UnsupportedMimeTypeException
     * @throws MissingMimeTypeException
     */
    public function testRenderFromMultipleTypes(): void
    {
        $viewManager = new ViewManager(
            AxisCareOptions::create()
        );

        $result = $viewManager->render(
            new Statement(
                [
                    'customer' => new Customer(['name' => 'test']),
                    'heading' => 'test',
                ]
            ),
            sprintf(
                '%s,%s',
                MimeType::TEXT_PLAIN,
                MimeType::TEXT_HTML
            )
        );

        $this->assertStringContainsString('<pre>', $result);
    }

    public function testUnsupportedRender(): void
    {
        $viewManager = new ViewManager(
            AxisCareOptions::create()
        );

        try {
            $viewManager->render(
                new Statement(
                    [
                        'customer' => new Customer(['name' => 'test']),
                        'heading' => 'test',
                    ]
                ),
                'random/format'
            );
        } catch (\Throwable $throwable) {
            $this->assertInstanceOf(UnsupportedMimeTypeException::class, $throwable);
        }
    }
}
