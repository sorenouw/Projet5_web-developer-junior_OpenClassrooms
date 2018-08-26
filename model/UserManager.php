<?php

namespace MiamDelice\Blog\Model;

class UserManager extends Manager
{
    public function getUser(User $user)
    {
        $req = $this->getDb()->prepare("SELECT * FROM user WHERE name = :name");
        $req->execute(
            array(
            'name' => $user->login(),
            )
        );
        $data = $req->fetch();
        return $data;
    }
}
