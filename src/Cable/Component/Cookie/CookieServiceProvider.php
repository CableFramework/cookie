<?php

namespace Cable\Cookie;


use Cable\Container\ServiceProvider;

class CookieServiceProvider extends ServiceProvider
{

    /**
     * register new providers or something
     *
     * @return mixed
     */
    public function boot(){}

    /**
     * register the content
     *
     * @return mixed
     */
    public function register()
    {
        $app = $this->getContainer();

        $app->singleton('cookie', function () use($app){
            $request = $app['request'];

            return new Cookie($request->cookies->all(), $app['response']);
        });

        $app->alias(Cookie::class, 'cookie');
    }
}