<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 24.11.2017
 * Time: 12:17
 */

namespace SanTourWeb\App\Model;

use SanTourWeb\Library\Entity\Category;
use SanTourWeb\Library\Entity\Pod;

use SanTourWeb\Library\Php\FirebaseLib;

class ModelCategories
{


    public function getCategories()
    {
        $firebase = FirebaseLib::getInstance();
        $categorieDB = json_decode($firebase->get('difficulties'));

        $categories = array();
        if(!empty($categorieDB)){

        foreach ($categorieDB as $key => $categorie) {
            array_push($categories, new Category($key, $categorie->name));
        }


        return $categories;
      }
    }

    public function updateCategory($id){

        $firebase = FirebaseLib::getInstance();
        $category = array(
            'name' => $_POST['name']
        );
        $firebase->update('difficulties/'.$id, $category);


    }


    public function addCategory($name)
    {
        $firebase = FirebaseLib::getInstance();
        $category = array(
            'name' => $name
        );
        $firebase->push('difficulties', $category);

    }

    public function deleteCategory($id)
    {
        $firebase = FirebaseLib::getInstance();

        $firebase->delete('difficulties/' . $id);

    }


    public function getCategoryById($id)
    {

        $firebase = FirebaseLib::getInstance();
        $categoryDB = json_decode($firebase->get('difficulties/' . $id));

        $category = new Category($id, $categoryDB->name);


        return $category;
    }

}