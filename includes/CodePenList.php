<?php

namespace Pine\CodePenList;

class CodePenList
{
    /**
     * The module lookup.
     *
     * @var array
     */
    protected static $modules = [
        Modules\Feed::class,
        Modules\Cache::class,
        Modules\Editor::class,
        Modules\Realize::class,
    ];

    /**
     * Register the plugin hooks.
     *
     * @return void
     */
    public static function boot()
    {
        foreach (self::$modules as $module) {
            $module::registerHooks();
        }

        add_action('widgets_init', [Modules\Widget::class, 'register']);
        wp_oembed_add_provider('http://codepen.io/*/pen/*', 'http://codepen.io/api/oembed');
    }

    /**
     * Activate the plugin.
     *
     * @return void
     */
    public static function activate()
    {
        update_option('pine_codepen_list_shortcode_cachetime', 42300);
    }

    /**
     * Deactivate the plugin.
     *
     * @return void
     */
    public static function deactivate()
    {
        wp_cache_flush();
    }
}
