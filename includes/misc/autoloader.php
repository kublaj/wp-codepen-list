<?php

/**
 * The Codepen List specific autoloader.
 *
 * @param  string  $class
 * @return void
 */
spl_autoload_register(function ($class) {
    if (! strpos($class, 'Pine\\CodePenList\\') === 0) {
        return;
    }

    $fragments = explode('\\', str_replace('Pine\\CodePenList\\', '', $class));

    $file = pine_base_path(
        'includes/'.implode('/', $fragments).'.php'
    );

    if (file_exists($file)) {
        require_once $file;
    }
});
