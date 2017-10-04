<?php

namespace Pine\CodePenList\Contracts;

interface Module
{
    /**
     * Register the hooks.
     *
     * @return void
     */
    public static function registerHooks();
}
