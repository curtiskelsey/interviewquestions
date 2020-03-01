<?php


namespace AxisCare\View\Renderer;

use AxisCare\Model\Statement;

/**
 * Class StatementRenderer
 * @package AxisCare\View\Renderer
 */
class StatementRenderer implements
    RenderHtmlInterface,
    RenderTextInterface
{
    /**
     * @param mixed $object
     * @return string
     * @throws RenderTypeMismatchException
     */
    public function toText($object): string
    {
        if (!$object instanceof Statement) {
            throw new RenderTypeMismatchException(
                sprintf(
                    'Expected %s for rendering, received %s',
                    Statement::class,
                    is_object($object) ? get_class($object) : gettype($object)
                )
            );
        }

        $result = sprintf(
            "<pre>Rental Record for %s\n",
            $object->getHeading()
        );

        foreach ($object->getLineItems() as $text => $value) {
            $result .= sprintf(
                "\t%s\t%s\n",
                $text,
                $value
            );
        }

        // add footer lines
        $result .= sprintf(
            "Amount owed is %s\nYou earned %d frequent renter points</pre>",
            $object->getTotal(),
            $object->getFrequentRenterPoints()
        );

        return $result;
    }

    /**
     * @param mixed $object
     * @return string
     * @throws RenderTypeMismatchException
     */
    public function toHtml($object): string
    {
        if (!$object instanceof Statement) {
            throw new RenderTypeMismatchException(
                sprintf(
                    'Expected %s for rendering, received %s',
                    Statement::class,
                    is_object($object) ? get_class($object) : gettype($object)
                )
            );
        }

        $result = '<link rel="stylesheet" href="assets/css/index.css" type="text/css">';

        $result .= sprintf(
            '<h1 class="header">Rentals for <span class="customer-name">%s</span></h1>',
            $object->getHeading()
        );

        $result .= '<ul class="rental-list">';

        foreach ($object->getLineItems() as $text => $value) {
            $result .= sprintf(
                '<li class="rental-item">%s: %s</li>',
                $text,
                $value
            );
        }

        $result .= '</ul>';

        $result .= sprintf(
            '<p>Amount owed is <span class="total">%s</span></p>',
            $object->getTotal()
        );

        $result .= sprintf(
            '<p>You earned <span class="total">%s</span> frequent renter points</p>',
            $object->getFrequentRenterPoints()
        );

        return $result;
    }
}
