<?php
namespace Cable\Cookie\Facade;


use Cable\Facade\Facade;

class Cookie extends Facade
{

    protected static function getFacadeClass(){
        return 'cookie';
    }
}
