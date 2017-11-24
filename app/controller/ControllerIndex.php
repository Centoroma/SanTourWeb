<?php

namespace ResaBike\App\Controller;

use ResaBike\Library\Mvc\Controller;
use ResaBike\Library\Utils\Toast;
use ResaBike\Library\Utils\Redirect;


class ControllerIndex extends Controller
{

    public function index()
    {
        //If the user is already connected, redirect to the books page
        if (isset($_SESSION['connected']) && $_SESSION['connected'] == true)
            Redirect::toAction('tracks');

        if (isset($_POST['submit'])) {
            $error = false;
            $users = $this->model->getAllUsers();
            foreach ($users as $user) {
                if ($_POST['pseudo'] == $user['pseudo']) {
                    $password = $this->model->getPasswordByPseudo($user['pseudo']);
                    if ($_POST['password'] == $password) {
                        $_SESSION['connected'] = true;
                        $_SESSION['user'] = $user;
                        Redirect::toAction('tracks');
                    }
                } else
                    $error = true;
            }

            if ($error)
                Toast::message(__('The combination username/password does not match', true), 'red');
        }
        return $this->view->RenderPartial();
    }

    public function logout()
    {
        session_destroy();
        Redirect::toAction('tracks');
    }
}