<?php

namespace SanTourWeb\App\Model;

use SanTourWeb\Library\Entity\Poi;

use SanTourWeb\Library\Entity\Coordinate;
use SanTourWeb\Library\Mvc\Model;
use SanTourWeb\Library\Entity\Track;
use SanTourWeb\Library\Php\FirebaseLib;
use SanTourWeb\Library\Entity\Pod;

class ModelTracks extends Model
{
    public function getTracks()
    {
        $firebase = FirebaseLib::getInstance();
        $trackDB = json_decode($firebase->get('tracks'));
        $tracks = array();
        if (!empty($trackDB)) {

            foreach ($trackDB as $key => $track) {

                array_push($tracks, new Track($key, $track->name, $track->length, $track->timer, null   ));
            }


            return $tracks;
        }
    }

    public function deleteTrack($id)
    {
        $firebase = FirebaseLib::getInstance();

        $firebase->delete('tracks/' . $id);

    }


    public function updateTrack($id)
    {

        $firebase = FirebaseLib::getInstance();
        $track = array(
            'name' => $_POST['nameTrack']
        );
        $firebase->update('tracks/' . $id, $track);


    }


    public function getTrackById($id)
    {

        $firebase = FirebaseLib::getInstance();
        $trackDB = json_decode($firebase->get('tracks/' . $id));

        if(!empty($trackDB->pois)){
            $poiDB = $trackDB->pois;
        }
        if(!empty($trackDB->pods)){
            $podDB = $trackDB->pods;
        }


        $coordDB = $trackDB->coordinates;

        $coords = array();
        foreach ($coordDB as $coord){
            $coordinate = new Coordinate($coord->altitude,$coord->date,$coord->gdop,$coord->latitude,$coord->longitude,$coord->nbre_sat);
            array_push($coords, $coordinate);
        }


        $pods = array();
        if(!empty($trackDB->pods)) {
            foreach ($podDB as $pod) {
                $coordinate = new Coordinate($pod->coordinate->altitude, $pod->coordinate->date, $pod->coordinate->gdop, $pod->coordinate->latitude, $pod->coordinate->longitude, $pod->coordinate->nbre_sat);
                array_push($pods, new Pod($coordinate, $pod->description, $pod->name, null));
            }
        }

        $pois = array();
        if(!empty($trackDB->pois)) {
            foreach ($poiDB as $poi) {
                $coordinate = new Coordinate($poi->coordinate->altitude, $poi->coordinate->date, $poi->coordinate->gdop, $poi->coordinate->latitude, $poi->coordinate->longitude, $poi->coordinate->nbre_sat);
                array_push($pois, new Poi($coordinate, $poi->description, $poi->name, null));
            }
        }


        $track = new Track($id, $trackDB->name, $trackDB->length, $trackDB->timer, $coords);
        $track->setPods($pods);
        $track->setPois($pois);



        return $track;
    }


}