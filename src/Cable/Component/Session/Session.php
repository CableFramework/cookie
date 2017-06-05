<?php

namespace Cable\Session;
use Symfony\Component\HttpFoundation\Session\Session as Base;

class Session
{

    /**
     * @var Session
     */
    private $session;

    /**
     * Session constructor.
     * @param Session $session
     */
    public function __construct(Base $session)
    {
        $this->session = $session;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function get($name)
    {
        return $this->session->get($name);
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return $this
     */
    public function set($name, $value)
    {
        $this->session->set($name, $value);

        return $this;
    }

    /**
     * @param $name
     * @return $this
     */
    public function delete($name)
    {
        $this->session->delete($name);

        return $this;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function has($name)
    {
        return $this->session->has($name);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface
     */
    public function flashbag()
    {
        return $this->session->getFlashBag();
    }
}
