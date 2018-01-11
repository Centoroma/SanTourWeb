<?php

namespace SanTourWeb\Library\Entity;

class Pod
{

    private $coordinate;
    private $description;
    private $name;
    private $picture;
    private $difficulty;

    /**
     * Pod constructor.
     * @param $name
     */
    public function __construct($coordinate, $description, $name, $picture, $difficulty)
    {
        $this->coordinate = $coordinate;
        $this->description = $description;
        $this->name = $name;
        $this->picture = $picture;
        $this->difficulty = $difficulty;
    }

    /**
     * @return mixed
     */
    public function getCoordinate()
    {
        return $this->coordinate;
    }

    /**
     * @param mixed $coordinate
     */
    public function setCoordinate($coordinate)
    {
        $this->coordinate = $coordinate;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    /**
     * @return mixed
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * @param mixed $difficulty
     */
    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;
    }


}