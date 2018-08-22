<?php

namespace MiamDelice\Blog\Model;

class User
{
    private $login;
    private $password;
    private $mail;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        if (isset($data["login"])) {
            $this->setLogin($data[ "login"]);
        }
        if (isset($data["password"])) {
            $this->setPassword($data[ "password"]);
        }
        if (isset($data["mail"])) {
            $this->setMail($data[ "mail"]);
        }
    }

    // Getters
    public function login()
    {
        return $this->login;
    }

    public function password()
    {
        return $this->password;
    }

    public function mail()
    {
        return $this->mail;
    }

    // Setters
    public function setLogin($login)
    {
        if (is_string($login)) {
            $this->login = $login;
        }
    }

    public function setPassword($password)
    {
        if (is_string($password)) {
            $this->password = $password;
        }
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }
}
