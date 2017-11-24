<?php

namespace ResaBike\App\Controller;

use ResaBike\Library\Mvc\Controller;
use ResaBike\Library\Utils\Toast;
use ResaBike\Library\Utils\Redirect;


class ControllerCategories extends Controller
{

    public function index()
    {

        return $this->view->Render();
    }


    public function edit()
    {
        if(isset($_POST['submit'])) {
       header("Location: /SanTourWeb/categories");
        }

        return $this->view->Render();
    }

    public function add()
    {
        if(isset($_POST['submit'])) {
            header("Location: /SanTourWeb/categories");
        }

        return $this->view->Render();
    }

}