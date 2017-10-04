<?php

namespace Pine\CodePenList\Modules;

class Cache extends Module
{
    /**
     * Get the cache time from the options.
     *
     * @return null|string
     */
    public static function getCacheTime()
    {
        return get_option('pine_codepen_list_shortcode_cachetime');
    }

    /**
     * Set the cache time.
     *
     * @param  integer $cachetime
     * @return void
     */
    public static function bindCacheFilter($cachetime = 43200)
    {
        update_option('pine_codepen_list_shortcode_cachetime', $cachetime);
        add_filter('wp_feed_cache_transient_lifetime', [__CLASS__, 'getCacheTime']);
    }

    /**
     * Unset the cache time.
     *
     * @return void
     */
    public static function unbindCacheFilter()
    {
        remove_filter('wp_feed_cache_transient_lifetime', [__CLASS__, 'getCacheTime']);
    }

    /**
     * Register the hooks.
     *
     * @return void
     */
    public static function registerHooks()
    {
        add_action('bind_codepenlist_cache_filter', [__CLASS__, 'bindCacheFilter']);
        add_action('unbind_codepenlist_cache_filter', [__CLASS__, 'unbindCacheFilter']);
    }
}
