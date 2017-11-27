<?php

namespace SanTourWeb\Library\Entity;

class Track {
    private $id;
    private $name;
    private $length;
    private $timer;
    private $pods;

    /**
     * Track constructor.
     * @param $id
     * @param $name
     * @param $length
     * @param $timer
     * @param $pods
     */
    public function __construct($id, $name, $length, $timer/*, $pods*/)
    {
        $this->id = $id;
        $this->name = $name;
        $this->length = $length;
        $this->timer = $timer;
        //$this->pods = $pods;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param mixed $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }

    /**
     * @return mixed
     */
    public function getTimer()
    {
        return $this->timer;
    }

    /**
     * @param mixed $timer
     */
    public function setTimer($timer)
    {
        $this->timer = $timer;
    }

    /**
     * @return mixed
     */
    public function getPods()
    {
        return $this->pods;
    }

    /**
     * @param mixed $pods
     */
    public function setPods($pods)
    {
        $this->pods = $pods;
    }
}