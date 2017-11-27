<?php

namespace SanTourWeb\App\Model;

use SanTourWeb\Library\Mvc\Model;
use SanTourWeb\Library\Entity\Book;
use SanTourWeb\Library\Entity\Station;

class ModelIndex extends Model
{
    public function getUser($id){
        $userManager = new User();
        $user = $userManager->getUserById($id);
        return $user;
    }

    public function getAllUsers() {
        $userManager = new User();
        $users = $userManager->getAllUser();
        return $users;
    }

    public function getPasswordByPseudo($pseudo) {
        $users = $this->getAllUsers();
        foreach($users as $user) {
            if($user['pseudo'] == $pseudo)
                return $user['password'];
        }
    }
}