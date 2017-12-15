<?php

namespace SanTourWeb\App\Controller;

use SanTourWeb\Library\Mvc\Controller;
use SanTourWeb\Library\Utils\Toast;
use SanTourWeb\Library\Utils\Redirect;

class ControllerTracks extends Controller
{
    public function index()
    {
        $tracks = $this->model->getTracks();
        $this->view->Set('tracks', $tracks);
        return $this->view->Render();
    }

    public function details()
    {
        if(!isset($_GET['id']) || empty($_GET['id']))
            Redirect::toLastPage();
        else {
            $track = $this->model->getTrackById($_GET['id']);
            $this->view->Set('track', $track);




            return $this->view->Render();

        }

    }

    public function delete()
    {
        $this->model->deleteTrack($_GET['id']);

        Redirect::toAction('tracks');


    }

    public function edit()
    {
        if(!isset($_GET['id']) || empty($_GET['id']))
            Redirect::toLastPage();
        else {
            $track = $this->model->getTrackById($_GET['id']);
            $this->view->Set('track', $track);



            if (isset($_POST['submitUpdate'])) {

                $this->model->updateTrack($_GET['id']);

                Redirect::toAction('tracks');



            }


            return $this->view->Render();

        }
    }

    public function update()
    {



        $newName = $_GET['nameTrack'];

        $this->model->updateTrack($_GET['id'],$_GET['name']);
        Redirect::toAction('tracks');


    }

}