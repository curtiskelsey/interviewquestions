<?php


namespace AxisCareTest\View\Renderer;

use AxisCare\Enumerable\MimeType;
use AxisCare\MissingPluginException;
use AxisCare\Model\Customer;
use AxisCare\Model\Statement;
use AxisCare\Option\AxisCareOptions;
use AxisCare\View\MissingMimeTypeException;
use AxisCare\View\UnsupportedMimeTypeException;
use AxisCare\View\ViewManager;
use PHPUnit\Framework\TestCase;

class StatementRendererTest extends TestCase
{
    /**
     * @throws MissingMimeTypeException
     * @throws UnsupportedMimeTypeException
     * @throws MissingPluginException
     */
    public function testRenderText(): void
    {
        $viewManager = new ViewManager(
            AxisCareOptions::create()
        );

        $statement = new Statement(
            [
                'customer' => new Customer(['name' => 'test']),
                'heading' => 'test',
            ]
        );

        $this->assertStringContainsString(
            "<pre>Rental Record for test\nAmount owed is 0\nYou earned 0 frequent renter points</pre>",
            $viewManager->render($statement, MimeType::TEXT_PLAIN)
        );
    }

    /**
     * @throws MissingMimeTypeException
     * @throws MissingPluginException
     * @throws UnsupportedMimeTypeException
     */
    public function testRenderHtml(): void
    {
        $viewManager = new ViewManager(
            AxisCareOptions::create()
        );

        $statement = new Statement(
            [
                'customer' => new Customer(['name' => 'test']),
                'heading' => 'test',
            ]
        );

        $this->assertStringContainsString(
            '<h1',
            $viewManager->render($statement, MimeType::TEXT_HTML)
        );
    }
}
