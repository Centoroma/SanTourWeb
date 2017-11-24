<?php
namespace ResaBike\App\Model;

use ResaBike\Library\Mvc\Model;
use ResaBike\Library\Entity\Zone;
use ResaBike\Library\Entity\Line;
use ResaBike\Library\Entity\Station;

class ModelTracks extends Model{
    public function getTracksByName($input)
    {
        $trackManager = new Station();
        $tracks = $trackManager->getTracksByName($input);
        $arrTracks = [];
        foreach ($tracks as $track) {
            $arrTracks[] = $track;
        };

        return $arrTracks;
    }

    /* public function getIdStationByName($name)
     {
         $stationManager = new Station();
         $stations = $stationManager->getAllStation();
         foreach ($stations as $station) {
             if ($station['name'] == $name) {
                 return $station['id'];
             }
         }
     }
    */

    public function getTrack($id) {
        $trackManager = new Station();
        return $trackManager->getTrackById($id);
    }

    public function deleteTrack($id) {
        $trackManager = new Track();
        return $trackManager->deleteTrack($id);
    }
}