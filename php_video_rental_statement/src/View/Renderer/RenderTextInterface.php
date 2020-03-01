<?php


namespace AxisCare\View\Renderer;

/**
 * Interface TextRenderableInterface
 * @package AxisCare
 */
interface RenderTextInterface
{
    /**
     * Create a text string from the provided $object
     *
     * @param mixed $object
     * @return string
     */
    public function toText($object): string;
}
