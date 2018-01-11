<?php

namespace SanTourWeb\App\Controller;

use SanTourWeb\Library\Mvc\Controller;
use SanTourWeb\Library\Utils\Toast;
use SanTourWeb\Library\Utils\Redirect;
use SanTourWeb\Library\Php\FirebaseLib;


class ControllerIndex extends Controller
{

    // login page
    public function index()
    {
        $users = $this->model->getAllUsers();
        $this->view->Set('users', $users);


        //If the user is already connected, redirect to the books page
        if (isset($_SESSION['connected']) && $_SESSION['connected'] == true)
            Redirect::toAction('tracks');


        if (isset($_POST['submit'])) {

            $error = false;
            $users = $this->model->getAllUsers();
            foreach ($users as $user) {
                if ($_POST['pseudo'] == $user->getName()) {
                    $password = $this->model->getPasswordByName($user->getName());
                    if ($_POST['password'] == $password) {
                        $_SESSION['connected'] = true;
                        $_SESSION['user'] = $user;
                        Redirect::toAction('tracks');
                    }
                } else
                    $error = true;
            }

            if ($error)
                Toast::message('User or mdp incorrect', 'red');
        }
        return $this->view->Render();
    }

    //logout
    public function logout()
    {
        session_destroy();
        Redirect::toAction('index');
    }

}