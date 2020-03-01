<?php


namespace AxisCare\View;

use AxisCare\MissingPluginException;
use AxisCare\Option\AxisCareOptions;
use AxisCare\Option\AxisCareOptionsAwareTrait;
use AxisCare\View\Renderer\RenderHtmlInterface;
use AxisCare\View\Renderer\RenderTextInterface;

/**
 * Class ViewManager
 * @package AxisCare\View
 */
class ViewManager
{
    use AxisCareOptionsAwareTrait;

    /**
     * ViewManager constructor.
     * @param AxisCareOptions $axisCareOptions
     */
    public function __construct(AxisCareOptions $axisCareOptions)
    {
        $this->axisCareOptions = $axisCareOptions;
    }

    protected function getPluginClassName(string $plugin): ?string
    {
        $viewRenderPlugins = $this->getAxisCareOptions()->getViewRendererPlugins();

        if (array_key_exists($plugin, $viewRenderPlugins)) {
            return $viewRenderPlugins[$plugin];
        }

        return null;
    }

    public function get(string $plugin)
    {
        $pluginClassName = $this->getPluginClassName($plugin);

        if (!$pluginClassName) {
            throw new MissingPluginException(
                sprintf (
                    'A view rendering plugin was not found for %s',
                    $plugin
                )
            );
        }

        return new $pluginClassName();
    }

    /**
     * @param mixed $object
     * @param string|null $acceptHeaderString
     * @return string
     * @throws UnsupportedMimeTypeException
     * @throws MissingMimeTypeException
     * @throws MissingPluginException
     */
    public function render($object, ?string $acceptHeaderString): string
    {
        $requiredRenderingInterface = $this->parseFormat($acceptHeaderString);
        $renderer = $this->get(get_class($object));

        if (!$renderer instanceof $requiredRenderingInterface) {
            throw new UnsupportedMimeTypeException(
                sprintf(
                    '%s must implement %s to be renderable',
                    get_class($object),
                    $requiredRenderingInterface
                )
            );
        }

        switch ($requiredRenderingInterface) {
            case RenderHtmlInterface::class:
                return $renderer->toHtml($object);
                break;
            case RenderTextInterface::class:
                return $renderer->toText($object);
            default:
                throw new MissingMimeTypeException(
                    'A supported mime type was not provided for rendering'
                );
                break;
        }
    }

    /**
     * Sometimes the ACCEPT header on an HTTP request will have more than one accepted type
     *
     * @param string|null $acceptHeaderString
     * @return string|null
     * @throws UnsupportedMimeTypeException
     */
    private function parseFormat(?string $acceptHeaderString): ?string
    {
        if (!$acceptHeaderString) {
            return $acceptHeaderString;
        }

        $supportedMimeTypes = $this->getAxisCareOptions()->getSupportedMimeTypes();
        $supportedMimeTypeKeys = array_keys($supportedMimeTypes);

        $types = explode(',', $acceptHeaderString);

        if (count($types) > 0) {
            foreach ($types as $type) {
                if (in_array($type, $supportedMimeTypeKeys, true)) {
                    return $supportedMimeTypes[$type];
                }
            }

            throw new UnsupportedMimeTypeException(
                sprintf(
                    '%s is not currently supported for rendering',
                    $acceptHeaderString
                )
            );
        }

        return null;
    }
}
