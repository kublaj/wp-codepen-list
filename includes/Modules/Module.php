<?php

namespace Pine\CodePenList\Modules;

use Pine\CodePenList\Contracts\Module as Contract;

abstract class Module implements Contract
{
    /**
     * Register the hooks.
     *
     * @return void
     */
    public static function registerHooks()
    {
        //
    }
}
