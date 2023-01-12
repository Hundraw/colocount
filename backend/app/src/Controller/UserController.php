<?php

namespace App\Controller;

use App\Route\Route;

class UserController extends AbstractController
{
    #[Route('/', name: "homepage", methods: ["GET"])]
    public function test(){

        $this->render("login.php", [
        ],"Login");
    }

    #[Route('/register', name: "homepage", methods: ["GET"])]
    public function register(){

        $this->render("register.php", [
        ],"Register");
    }
}