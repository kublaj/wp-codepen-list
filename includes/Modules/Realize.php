<?php

namespace Pine\CodePenList\Modules;

class Realize extends Module
{
    /**
     * Build the full list.
     *
     * @param  array  $args
     * @return string
     */
    public static function build($args)
    {
        ob_start();

        foreach ($args['response'] as $item) {
            self::buildItem($item, $args['atts']);
        }

        return sprintf('<ul class="bits-codepen-list">%s</ul>', ob_get_clean());
    }

    /**
     * Build a single list item.
     *
     * @param  SimplePieItem $item
     * @param  array  $atts
     * @return string
     */
    protected static function buildItem($item, $atts)
    {
        include pine_base_path('includes/templates/list.php');
    }
}
