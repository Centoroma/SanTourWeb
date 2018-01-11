<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 09.01.2018
 * Time: 11:12
 */

namespace SanTourWeb\Library\Entity;



class Difficulty
{

    private $gradiant;
    private $name;

    public function __construct( $gradiant,$name)
    {
        $this->gradiant = $gradiant;
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getGradiant()
    {
        return $this->gradiant;
    }

    /**
     * @param mixed $gradiant
     */
    public function setGradiant($gradiant)
    {
        $this->gradiant = $gradiant;
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


}