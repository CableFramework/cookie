<?php

namespace Cable\Session\Facade;


use Cable\Facade\Facade;

class Session extends Facade
{

    protected static function getFacadeClass()
    {
        return 'session';
    }
}