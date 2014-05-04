<?php

namespace Grupo51\ProyectoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function homeAction()
    {	

        return $this->render('Grupo51ProyectoBundle:Default:home.html.twig', array('error'=>''));
    }
}