<?php

namespace Problematic\AuthNetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AuthNetController extends Controller
{

    public function indexAction()
    {

        return $this->render('ProblematicAuthNetBundle:AuthNet:index.html.twig', array());
    }

}
