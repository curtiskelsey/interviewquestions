<?php


namespace AxisCare\View;

use AxisCare\Enumerable\MimeType;
use AxisCare\MissingPluginException;
use AxisCare\Option\AxisCareOptions;
use AxisCare\Option\AxisCareOptionsAwareTrait;

/**
 * Class ViewManager
 * @package AxisCare\View
 */
class ViewManager
{
    use AxisCareOptionsAwareTrait;

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
     * @param string|null $format
     * @return string
     * @throws UnsupportedMimeTypeException
     * @throws MissingMimeTypeException
     * @throws MissingPluginException
     */
    public function render($object, ?string $format): string
    {
        $supportedMimeTypes = $this->getAxisCareOptions()->getSupportedMimeTypes();

        if (!in_array($format, array_keys($supportedMimeTypes), true)) {
            throw new UnsupportedMimeTypeException(
                sprintf(
                    '%s is not currently supported for rendering',
                    $format
                )
            );
        }

        $requiredRenderingInterface = $supportedMimeTypes[$format];
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

        switch ($format) {
            case MimeType::WILDCARD:
            case MimeType::TEXT_HTML:
                return $renderer->toHtml($object);
                break;
            case MimeType::TEXT_PLAIN:
                return $renderer->toText($object);
            default:
                throw new MissingMimeTypeException(
                    'A supported mime type was not provided for rendering'
                );
                break;
        }
    }
}
