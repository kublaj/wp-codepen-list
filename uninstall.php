<?php

if (! defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

delete_option('pine_codepen_list_shortcode_cachetime');
