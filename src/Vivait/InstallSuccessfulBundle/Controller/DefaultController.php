<?php

namespace Vivait\InstallSuccessfulBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('VivaitInstallSuccessfulBundle:Default:index.html.twig', array('name' => $name));
    }
}
