<?php

namespace Cable\Cookie;

use Symfony\Component\HttpFoundation\Cookie as Base;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class Cookie
 * @package Cable\Cookie
 */
class Cookie
{

    /**
     * @var array
     */
    private $cookies;

    /**
     * @var Response
     */
    private $response;
    /**
     * Cookie constructor.
     * @param array $cookies
     * @param Response $response
     */
    public function __construct(array $cookies, Response $response)
    {
        $this->cookies = $cookies;
        $this->response = $response;
    }

    /**
     * @param string $name
     * @param mixed $value
     * @param int $time
     * @param string $path
     * @param null $domain
     * @param bool $secure
     * @param bool $httpOnly
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function set($name, $value, $time = 3600, $path = '/', $domain = null, $secure = false, $httpOnly = true)
    {
        if ($time !== null) {
            $datetime = new \DateTime();

            $datetime->modify('+'.$time.' seconds');
        }else{
            $datetime = null;
        }


        $this->response->headers->setCookie(
            new Base($name, $value,  $datetime, $path, $domain, $secure, $httpOnly)
        );

        return $this;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function get($name)
    {
        return $this->cookies[$name];
    }

    /**
     * @param string $name
     * @return $this
     */
    public function delete($name)
    {
        $this->set($name, '', time() - 100);

        unset($this->cookies[$name]);

        return $this;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function has($name)
    {
        return isset($this->cookies[$name]);
    }

    /**
     * @return Response
     */
    public function getResponse(){
        return $this->response;
    }
}
