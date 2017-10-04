<?php

namespace Pine\CodePenList\Modules;

class Editor extends Module
{
    /**
     * Extend the TinyMce editor.
     *
     * @return void
     */
    public static function extendEditor()
    {
        add_filter('mce_buttons', [__CLASS__, 'extendMceButtons']);
        add_filter('mce_external_plugins', [__CLASS__, 'extendMcePlugins']);
    }

    /**
     * Extend the TinyMCE plugins.
     *
     * @param  array  $plugins
     * @return array
     */
    public static function extendMcePlugins($plugins)
    {
        $plugins['pine_codepen_list'] = pine_base_url('js/codepen-list.js');

        return $plugins;
    }

    /**
     * Get the translations for the TinyMCE plugin.
     *
     * @return void
     */
    public static function getTranslations()
    {
        $translations = [
            'type'          => __('Type:', 'pine-codepen-list'),
            'count'         => __('Posts:', 'pine-codepen-list'),
            'hours'         => __('hours', 'pine-codepen-list'),
            'target'        => __('Target:', 'pine-codepen-list'),
            'posts'         => __('Posts', 'pine-codepen-list'),
            'public'        => __('Public', 'pine-codepen-list'),
            'popular'       => __('Popular', 'pine-codepen-list'),
            'username'      => __('Username', 'pine-codepen-list'),
            'cacheTime'     => __('Cache time:', 'pine-codepen-list'),
            'newWindow'     => __('New window', 'pine-codepen-list'),
            'sameWindow'    => __('Same window', 'pine-codepen-list'),
            'insertList'    => __('Insert a CodePen List', 'pine-codepen-list'),
        ];

        wp_localize_script('jquery', 'PineCodePenList', $translations);
    }

    /**
     * Extend the TinyMce buttons.
     *
     * @param  array  $buttons
     * @return array
     */
    public static function extendMceButtons($buttons)
    {
        array_push($buttons, 'pine_codepen_list');

        return $buttons;
    }

    /**
     * Register the hooks.
     *
     * @return void
     */
    public static function registerHooks()
    {
        add_action('admin_enqueue_scripts', [__CLASS__, 'extendEditor']);
        add_action('admin_enqueue_scripts', [__CLASS__, 'getTranslations']);
    }
}
