<?php
namespace Cable\Session\Facade;


use Cable\Facade\Facade;

/**
 * Class Flashbag
 * @package Cable\Session\Facade
 */
class Flashbag extends Facade
{

    /**
     * @return string
     */
    protected static function getFacadeClass()
    {
        return 'session.flashbag';
    }

}