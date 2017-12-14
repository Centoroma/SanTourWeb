<?php

namespace SanTourWeb\App\Model;

use SanTourWeb\Library\Mvc\Model;
use SanTourWeb\Library\Entity\Track;
use SanTourWeb\Library\Php\FirebaseLib;

class ModelTracks extends Model
{
    public function getTracks()
    {
        $firebase = FirebaseLib::getInstance();
        $trackDB = json_decode($firebase->get('tracks'));
        $tracks = array();
        foreach ($trackDB as $key => $track) {
            array_push($tracks, new Track($key, $track->name, $track->length, $track->timer));
        }



        return $tracks;
    }

    public function deleteTrack($id)
    {
        $firebase = FirebaseLib::getInstance();

        $firebase->delete('tracks/'.$id);

    }



    public function updateTrack($id){

        $firebase = FirebaseLib::getInstance();
        $track = array(
            'name' => $_POST['nameTrack']
        );
        $firebase->update('tracks/'.$id, $track);


    }


    public function getTrackById($id)
    {

        $firebase = FirebaseLib::getInstance();
        $trackDB = json_decode($firebase->get('tracks/' . $id));

        /*$pods = array();
        foreach ($trackDB->pods as $pod) {
        array_push($pods, new Pod($pod->name, $pod->description, $pod->picture, null, null));
        }

        var_dump($pods);
*/
//        $pois = array();
//        foreach ($trackDB->pois as $poi) {
//            $position = new Position($poi->position->latitude, $poi->position->longitude, $poi->position->altitude, $poi->position->dateTime);
//            array_push($pois, new Poi($poi->name, $poi->description, $poi->picture, $position));
//        }
//
//        $positions = array();
//        foreach ($trackDB->positions as $key => $position) {
//            array_push($positions, new Position($position->latitude, $position->longitude, $position->altitude, $position->dateTime));
//        }

        //$track = new Track($id, $trackDB->idType, $trackDB->idUser, $trackDB->name, $trackDB->description, $trackDB->distance, $trackDB->duration, $pods, $pois, $positions);
        $track = new Track($id, $trackDB->name, $trackDB->length, $trackDB->timer, null);
     //   echo 'Track :<br />';
      //  echo 'Id : ' . $track->getId() . '<br />';
       // echo 'name : ' . $track->getName() . '<br />';
        //echo 'length : ' . $track->getLength() . '<br />';
        //echo 'timer : ' . $track->getTimer() . '<br />';
        //echo '<br />';
//        $i = 1;
//        foreach ($pods as $pod) {
//            echo 'POD ' . $i . ' : <br />';
//            echo 'Nom : ' . $pod->getName() . ', Description : ' . $pod->getDescription() . ', Picture : ' . $pod->getPicture() . '<br />';
//            echo 'Latitude : ' . $pod->getPosition()->getLatitude() . ', Longitude : ' . $pod->getPosition()->getLongitude() . ', Altitude : ' . $pod->getPosition()->getAltitude() . ', DateTime : ' . $pod->getPosition()->getDateTime() . '<br />';
//            foreach ($pod->getPodCategories() as $podCategory) {
//                $category = $this->getCategoryById($podCategory->getIdCategory());
//                echo 'Category : ' . $category->getName() . ', Value : ' . $podCategory->getValue() . '<br />';
//            }
//            echo '<br />';
//            $i++;
//        }
//        $i = 1;
//        foreach ($pois as $poi) {
//            echo 'POI ' . $i . ' : <br />';
//            echo 'Nom : ' . $poi->getName() . ', Description : ' . $poi->getDescription() . '<br />';
//            echo 'Latitude : ' . $poi->getPosition()->getLatitude() . ', Longitude : ' . $poi->getPosition()->getLongitude() . ', Altitude : ' . $poi->getPosition()->getAltitude() . ', DateTime : ' . $poi->getPosition()->getDateTime() . '<br />';
//            echo '<br />';
//            $i++;
//        }
//        $i = 1;
//        foreach ($positions as $position) {
//            echo 'Position ' . $i . ' : <br />';
//            echo 'Latitude : ' . $position->getLatitude() . ', Longitude : ' . $position->getLongitude() . ', Altitude : ' . $position->getAltitude() . ', DateTime : ' . $position->getDateTime() . '<br />';
//            echo '<br />';
//            $i++;
//        }

        return $track;
    }


    public function extractData(){

        $firebase = FirebaseLib::getInstance();
        $trackDB = json_decode($firebase->get('tracks'));

        include_once('firebase.php');
        $fo = fopen('file.csv', "r"); // CSV fiile
        while (($emapData = fgetcsv($fo, "", ",")) !== FALSE)
        {
            $sql = "INSERT into info (name,age,work,status) values ('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]')";
            mysql_query($sql);
        }

        // Connection
        include_once('conn.php');

        $sql = "select * from info";
        $qur = mysql_query($sql);

// Enable to download this file
        $filename = "sampledata.csv";

        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: text/csv");

        $display = fopen("php://output", 'w');

        $flag = false;
        while($row = mysql_fetch_assoc($qur)) {
            if(!$flag) {
                // display field/column names as first row
                fputcsv($display, array_keys($row), ",", '"');
                $flag = true;
            }
            fputcsv($display, array_values($row), ",", '"');
        }

        fclose($display);

    }
}