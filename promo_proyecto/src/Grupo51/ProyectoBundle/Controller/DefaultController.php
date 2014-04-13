<?php

namespace Grupo51\ProyectoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {	

        return $this->render('Grupo51ProyectoBundle:Default:index.html.twig', array('error'=>''));
    }
}
