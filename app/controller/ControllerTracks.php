<?php

namespace ResaBike\App\Controller;

use ResaBike\Library\Mvc\Controller;
use ResaBike\Library\Utils\Toast;
use ResaBike\Library\Utils\Redirect;

class ControllerTracks extends Controller
{
    public function index()
    {
        redirectIfNotConnected();
        redirectByRole(ROLE_SYS_ADMIN, $this);

        if (isset($_POST['submit'])) {
            $lastInsertId = $this->model->addZone($_POST['name']);
            Redirect::toAction('Lines', 'Add', array('zone'=>$lastInsertId));
        }

        if (isset($_POST['submitEdit'])) {
            $this->model->updateZone($_POST['editId'], $_POST['editName']);
            Redirect::toAction('Zones');
        }

        $zones = $this->model->getAllZones();
        $lines = [];

        foreach ($zones as $zone) {
            $lines[$zone['id']] = $this->model->getLinesByIdZone($zone['id']);
        }

        $this->view->Set('lines', $lines);
        $this->view->Set('zones', $zones);
        $this->view->SetLayout(APPPATH . DS . 'view' . DS . '_shared' . DS . 'view-admin.php');
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
}