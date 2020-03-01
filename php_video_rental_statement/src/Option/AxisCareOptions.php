<?php


namespace AxisCare\Option;

use AxisCare\ArraySerializableInterface;
use AxisCare\ArraySerializableTrait;
use AxisCare\Enumerable\MimeType;
use AxisCare\Model\Statement;
use AxisCare\View\Renderer\StatementRenderer;
use AxisCare\View\Renderer\RenderHtmlInterface;
use AxisCare\View\Renderer\RenderTextInterface;

/**
 * Class AxisCareOptions
 * @package AxisCare
 */
class AxisCareOptions implements ArraySerializableInterface
{
    use ArraySerializableTrait;

    /**
     * @var string[]
     */
    private $supportedMimeTypes = [
        MimeType::WILDCARD => RenderHtmlInterface::class,
        MimeType::TEXT_HTML => RenderHtmlInterface::class,
        MimeType::TEXT_PLAIN => RenderTextInterface::class,
    ];

    private $viewRendererPlugins = [
        Statement::class => StatementRenderer::class,
    ];

    public static function create(): self
    {
        $configPath = __DIR__ . '/../../config/local.php';

        if (file_exists($configPath)) {
            /** @noinspection PhpIncludeInspection */
            $config = include $configPath;

            return new self($config);
        }

        return new self([]);
    }

    public function __construct(array $options)
    {
        $this->fromArray($options);
    }

    /**
     * @codeCoverageIgnore
     * @return string[]
     */
    public function getSupportedMimeTypes(): array
    {
        return $this->supportedMimeTypes;
    }

    /**
     * @codeCoverageIgnore
     * @return string[]
     */
    public function getViewRendererPlugins(): array
    {
        return $this->viewRendererPlugins;
    }
}
