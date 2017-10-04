<?php

namespace Pine\CodePenList\Modules;

class Feed extends Module
{
    /**
     * The feed object.
     *
     * @var SimplePie
     */
    protected static $feed;

    /**
     * Render the list from the feed.
     *
     * @param  array  $atts
     * @return string
     */
    public static function render($atts)
    {
        do_action('bind_codepenlist_cache_filter', $atts['cachetime']);

        $response = self::fetchFeed($atts);

        if (is_array($response)) {
            $response = Realize::build(compact('response', 'atts'));
        }

        do_action('unbind_codepenlist_cache_filter');

        if (empty($atts['widget']) || ! $atts['widget']) {
            return $response;
        }

        echo $response;
    }

    /**
     * Fetch the feed.
     *
     * @param  array  $atts
     * @return string|array
     */
    protected static function fetchFeed($atts)
    {
        self::$feed = fetch_feed(
            "http://codepen.io/{$atts['username']}/{$atts['type']}/feed/"
        );

        if (! $response = self::checkFeed($atts)) {
            self::$feed->enable_order_by_date(false);
        }

        return $response;
    }

    /**
     * Check for feed errors, and return with the response.
     *
     * @param  array  $atts
     * @return array|string
     */
    protected static function checkFeed($atts)
    {
        if (is_wp_error(self::$feed)) {
            return __('Invalid RSS feed!', 'pine-codepen-list');
        }

        if (! $response = self::$feed->get_items(0, $atts['posts'])) {
            return __('No items', 'pine-codepen-list');
        }

        return $response;
    }

    /**
     * Register the hooks.
     *
     * @return void
     */
    public static function registerHooks()
    {
        add_shortcode('codepen-list', [__CLASS__, 'render']);
        add_action('pine_codepen_list_render', [__CLASS__, 'render']);
    }
}
