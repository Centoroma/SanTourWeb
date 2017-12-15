<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15.12.2017
 * Time: 13:05
 */

namespace SanTourWeb\Library\Entity;


class Coordinate
{

    private $altitude;

    private $date;

    private $gdop;

    private $latitude;
    private $longitude;

    private $nbre_sat;


    //private $position;
    //private $podCategories;

    /**
     * Pod constructor.
     * @param $name
     */
    public function __construct($altitude, $date, $gdop, $latitude, $longitude, $nbre_sat)
    {

        $this->altitude = $altitude;
        $this->date = $date;
        $this->gdop = $gdop;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->nbre_sat = $nbre_sat;


    }

    /**
     * @return mixed
     */
    public function getAltitude()
    {
        return $this->altitude;
    }

    /**
     * @param mixed $altitude
     */
    public function setAltitude($altitude)
    {
        $this->altitude = $altitude;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getGdop()
    {
        return $this->gdop;
    }

    /**
     * @param mixed $gdop
     */
    public function setGdop($gdop)
    {
        $this->gdop = $gdop;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getNbreSat()
    {
        return $this->nbre_sat;
    }

    /**
     * @param mixed $nbre_sat
     */
    public function setNbreSat($nbre_sat)
    {
        $this->nbre_sat = $nbre_sat;
    }


}