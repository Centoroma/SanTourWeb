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
}