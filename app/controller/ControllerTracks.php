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
            var_dump($track);

            return $this->view->Render();

        }

    }

    public function delete()
    {
        redirectIfNotConnected();
        redirectByRole(ROLE_SYS_ADMIN, $this);

        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $this->model->deleteZone($_GET['id']);
            Toast::message(__('Zone deleted', true), 'green');
            Redirect::toAction('Zones');
        } else
            Toast::message(__('Suppression failed', true), 'red');
    }

    public function edit()
    {
        if(!isset($_GET['id']) || empty($_GET['id']))
            Redirect::toLastPage();
        else {
            $track = $this->model->getTrackById($_GET['id']);
            $this->view->Set('track', $track);
            var_dump($track);

            return $this->view->Render();

        }
    }

}