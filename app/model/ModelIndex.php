<?php

namespace SanTourWeb\App\Model;

use SanTourWeb\Library\Entity\User;
use SanTourWeb\Library\Mvc\Model;
use SanTourWeb\Library\Entity\Book;
use SanTourWeb\Library\Entity\Station;
use SanTourWeb\Library\Php\FirebaseLib;


class ModelIndex extends Model
{


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

                if($user->getName() == $name){
                    $userGoal = $user;
                }
            }


            return $userGoal->getMdp();
        }


    }

    public function getPasswordByPseudo($pseudo)
    {
        $users = $this->getAllUsers();
        foreach ($users as $user) {
            if ($user['pseudo'] == $pseudo)
                return $user['password'];
        }
    }
}