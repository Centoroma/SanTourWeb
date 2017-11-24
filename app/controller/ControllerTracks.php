<?php

namespace ResaBike\App\Controller;

use ResaBike\Library\Mvc\Controller;
use ResaBike\Library\Utils\Toast;
use ResaBike\Library\Utils\Redirect;

class ControllerTracks extends Controller
{
    public function index()
    {

        return $this->view->Render();
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
        if(isset($_POST['submit'])) {

            //$this->model->addUser($_POST['idRole'], null, $_POST['pseudo'], "pass", $_POST['email']);

            //$this->model->addUser($_POST['idRole'], $_POST['idZone'], $_POST['pseudo'], "pass", $_POST['email']);
            header("Location: /SanTourWeb/tracks");
        }

        return $this->view->Render();
    }

}