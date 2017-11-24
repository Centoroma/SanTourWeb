<?php

namespace ResaBike\App\Model;

use ResaBike\Library\Mvc\Model;
use ResaBike\Library\Entity\Book;
use ResaBike\Library\Entity\Station;

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