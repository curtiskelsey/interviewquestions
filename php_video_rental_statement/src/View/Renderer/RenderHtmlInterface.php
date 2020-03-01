<?php


namespace AxisCare\View\Renderer;

/**
 * Interface RenderHtmlInterface
 * @package AxisCare
 */
interface RenderHtmlInterface
{
    /**
     * Creates an HTML string from the provided $object
     *
     * @param mixed $object
     * @return string
     */
    public function toHtml($object): string;
}
