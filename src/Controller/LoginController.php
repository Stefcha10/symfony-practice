<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function login() {

        return $this->render('security/login.html.twig', [

        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */

    public function logout() {


    }
}
