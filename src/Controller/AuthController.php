<?php

namespace Website\Controller;

class AuthController extends \Website\Core\Controller
{
    public function login(): string
    {
        return $this->render("login");
    }
}