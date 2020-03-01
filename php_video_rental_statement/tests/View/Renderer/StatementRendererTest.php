<?php


namespace AxisCareTest\View\Renderer;

use AxisCare\Enumerable\MimeType;
use AxisCare\MissingPluginException;
use AxisCare\Model\Customer;
use AxisCare\Model\Statement;
use AxisCare\Option\AxisCareOptions;
use AxisCare\View\MissingMimeTypeException;
use AxisCare\View\Renderer\RenderTypeMismatchException;
use AxisCare\View\Renderer\StatementRenderer;
use AxisCare\View\UnsupportedMimeTypeException;
use AxisCare\View\ViewManager;
use PHPUnit\Framework\TestCase;

class StatementRendererTest extends TestCase
{
    /**
     * @throws RenderTypeMismatchException
     */
    public function testRenderText(): void
    {
        $statementRenderer = new StatementRenderer();

        $statement = new Statement(
            [
                'customer' => new Customer(['name' => 'test']),
                'heading' => 'test',
            ]
        );

        $this->assertStringContainsString(
            "<pre>Rental Record for test\nAmount owed is 0\nYou earned 0 frequent renter points</pre>",
            $statementRenderer->toText($statement)
        );
    }

    /**
     * @throws RenderTypeMismatchException
     */
    public function testRenderHtml(): void
    {
        $statementRenderer = new StatementRenderer();

        $statement = new Statement(
            [
                'customer' => new Customer(['name' => 'test']),
                'heading' => 'test',
            ]
        );

        $this->assertStringContainsString(
            '<h1',
            $statementRenderer->toHtml($statement)
        );
    }
}
