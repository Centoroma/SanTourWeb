<?php

namespace SanTourWeb\App\Controller;

use SanTourWeb\Library\Mvc\Controller;
use SanTourWeb\Library\Utils\Toast;
use SanTourWeb\Library\Utils\Redirect;


class ControllerCategories extends Controller
{

    public function index()
    {

        return $this->view->Render();
    }


    public function edit()
    {
        if(isset($_POST['submit'])) {
            Redirect::toAction('categories');
        }

        return $this->view->Render();
    }

    public function add()
    {
        if(isset($_POST['submit'])) {
            Redirect::toAction('categories');
        }

        return $this->view->Render();
    }

}