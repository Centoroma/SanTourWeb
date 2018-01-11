<?php

namespace SanTourWeb\App\Model;

use SanTourWeb\Library\Entity\User;
use SanTourWeb\Library\Mvc\Model;
use SanTourWeb\Library\Entity\Book;
use SanTourWeb\Library\Entity\Station;
use SanTourWeb\Library\Php\FirebaseLib;


class ModelIndex extends Model
{

    //get all users
    public function getAllUsers()
    {
        $firebase = FirebaseLib::getInstance();
        $userDB = json_decode($firebase->get('users'));

        $users = array();
        if (!empty($userDB)) {

            foreach ($userDB as $key => $user) {
                array_push($users, new User($key, $user->name, $user->mdp));
            }

            return $users;
        }
    }

    //get the password of a user by his name
    public function getPasswordByName($name)
    {

        $firebase = FirebaseLib::getInstance();
        $userDB = json_decode($firebase->get('users'));

        $users = array();
        if (!empty($userDB)) {

            foreach ($userDB as $key => $user) {
                array_push($users, new User($key, $user->name, $user->mdp));
            }

            foreach ($users as $key => $user) {

                if ($user->getName() == $name) {
                    $userGoal = $user;
                }
            }


            return $userGoal->getMdp();
        }

    }


}