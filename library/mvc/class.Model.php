<?php
namespace ResaBike\Library\Mvc;

use ResaBike\Library\Entity\Station;
use ResaBike\Library\Entity\Stop;

class Model{
    public function deleteStops($idLine) {
        $stopManager = new Stop();
        $stops = $stopManager->getAllStop();
        $stationsIds = [];
        $i = 0;
        foreach($stops as $stop) {
            if($stop['idLine'] == $idLine) {
                $stopManager->deleteStop($idLine);
                $stationsIds[$i] = $stop['idStation'];
                $i++;
            }
        }
        return $stationsIds;
    }

    public function deleteStations($idLine) {
        $stationManager = new Station();
        $stopManager = new Stop();

        // Récupère les ids des stations et supprime les stops
        $stationsIds = $this->deleteStops($idLine);

        // Récupère tous les stops restants
        $stops = $stopManager->getAllStop();

        foreach($stationsIds as $ids) {
            $exists = false;
            foreach($stops as $stop) {
                // Si la station est encore utilisée, pas de suppression
                if($ids == $stop['idStation'])
                    $exists = true;
            }

            if(!$exists)
                // Supprime chaque station si elle n'est plus utilisée
                $stationManager->deleteStation($ids);
        }
    }
}