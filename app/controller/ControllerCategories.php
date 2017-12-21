<?php

namespace SanTourWeb\App\Controller;

use SanTourWeb\Library\Mvc\Controller;
use SanTourWeb\Library\Utils\Toast;
use SanTourWeb\Library\Utils\Redirect;


class ControllerCategories extends Controller
{

    public function index()
    {
        if (isset($_SESSION['connected'])){
        $categories = $this->model->getCategories();
        $this->view->Set('categories', $categories);
        return $this->view->Render();
        }
        else{
            Redirect::toAction('index');
        }

    }


    public function edit()
    {
        if (!isset($_GET['id']) || empty($_GET['id']))
            Redirect::toLastPage();
        else {
            $category = $this->model->getCategoryById($_GET['id']);
            $this->view->Set('category', $category);


            if (isset($_POST['submitUpdate'])) {

                $this->model->updateCategory($_GET['id']);

                Redirect::toAction('categories');


            }

            return $this->view->Render();

        }


    }

    public function add()
    {
        if (isset($_POST['submit'])) {

            //CategoryName
            $name = $_POST['name'];
            var_dump($name);
            $this->model->addCategory($name);

            Redirect::toAction('categories');


        }

        return $this->view->Render();
    }

    public function delete()
    {


        $this->model->deleteCategory($_GET['id']);

        Redirect::toAction('categories');


    }


}