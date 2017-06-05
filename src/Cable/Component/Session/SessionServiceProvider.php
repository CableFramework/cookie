<?php

namespace Cable\Session;

use Cable\Container\ServiceProvider;
use Symfony\Component\HttpFoundation\Session\Session as Base;
/**
 * Class SessionServiceProvider
 * @package Cable\Session
 */
class SessionServiceProvider extends ServiceProvider
{


    /**
     * register new providers or something
     *
     * @return mixed
     */
    public function boot()
    {

    }

    /**
     * register the content
     *
     * @return mixed
     */
    public function register()
    {

        $app = $this->getContainer();
        $app->singleton('session', function ()use($app){
            $base = new Base();
            $base->start();

            return new Session($base);
        });

        $app->alias(Session::class, 'session');

        $app->singleton('flashbag', function () use ($app){
           return $app->make('session')->flashbag();
        });
    }
}
