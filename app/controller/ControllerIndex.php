<?php

namespace SanTourWeb\App\Controller;

use SanTourWeb\Library\Mvc\Controller;
use SanTourWeb\Library\Utils\Toast;
use SanTourWeb\Library\Utils\Redirect;
use SanTourWeb\Library\Php\FirebaseLib;


class ControllerIndex extends Controller
{

    public function index()
    {
        //If the user is already connected, redirect to the books page
//        if (isset($_SESSION['connected']) && $_SESSION['connected'] == true)
//            Redirect::toAction('tracks');
//
//        if (isset($_POST['submit'])) {
//            header("Location: /SanTourWeb/tracks");
//            $error = false;
//            $users = $this->model->getAllUsers();
//            foreach ($users as $user) {
//                if ($_POST['pseudo'] == $user['pseudo']) {
//                    $password = $this->model->getPasswordByPseudo($user['pseudo']);
//                    if ($_POST['password'] == $password) {
//                        $_SESSION['connected'] = true;
//                        $_SESSION['user'] = $user;
//                        Redirect::toAction('tracks');
//                    }
//                } else
//                    $error = true;
//            }
//
//            if ($error)
//                Toast::message(__('The combination username/password does not match', true), 'red');
//        }
        $this->view->SetLayout(APPPATH . DS . 'view' . DS . '_shared' . DS . 'view-main.php');
        return $this->view->Render();
    }

    public function logout()
    {
        session_destroy();
        Redirect::toAction('tracks');
    }

    public function home()
    {
        return $this->view->Render();
    }
}