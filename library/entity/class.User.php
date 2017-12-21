<?php

namespace SanTourWeb\Library\Entity;

class User {
    private $id;
    private $name;
    private $mdp;

    /**
     * Category constructor.
     * @param $id
     * @param $name
     * @param $mdp
     */
    public function __construct($id, $name, $mdp)
    {
        $this->id = $id;
        $this->name = $name;
        $this->mdp = $mdp;
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
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }


}