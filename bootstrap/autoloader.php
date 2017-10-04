<?php

// The autoloader takes care of automatic file loading.
// If the given class has the namespace we want, we
// include the file automatically.
spl_autoload_register(function ($class) {
    if (! strpos($class, 'Pine\\CodePenList\\') === 0) {
        return;
    }

    $file = pine_base_path(sprintf(
        'core/%s.php',
        str_replace('\\', '/', str_replace('Pine\\CodePenList\\', '', $class))
    ));

    if (file_exists($file)) {
        require_once $file;
    }
});
