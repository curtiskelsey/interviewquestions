<?php


namespace AxisCareTest\View\Renderer;

use AxisCare\Model\Customer;
use AxisCare\Model\Statement;
use AxisCare\View\Renderer\RenderTypeMismatchException;
use AxisCare\View\Renderer\StatementRenderer;
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

    public function testRenderTextMismatch(): void
    {
        $statementRenderer = new StatementRenderer();

        $customer = new Customer([]);

        try {
            $statementRenderer->toText($customer);
        } catch (\Throwable $throwable) {
            $this->assertInstanceOf(RenderTypeMismatchException::class, $throwable);
        }
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

    public function testRenderHtmlMismatch(): void
    {
        $statementRenderer = new StatementRenderer();

        $customer = new Customer([]);

        try {
            $statementRenderer->toHtml($customer);
        } catch (\Throwable $throwable) {
            $this->assertInstanceOf(RenderTypeMismatchException::class, $throwable);
        }
    }
}
