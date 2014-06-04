<?php

namespace Vivait\CRMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CustomerController extends Controller
{
    public function listAction()
    {
        return $this->render('VivaitCRMBundle:Customer:list.html.twig', []);
    }
}
