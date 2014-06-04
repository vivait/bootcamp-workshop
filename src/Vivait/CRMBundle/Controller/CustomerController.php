<?php

namespace Vivait\CRMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Vivait\CRMBundle\Entity\Customer;

class CustomerController extends Controller
{
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $customers = $em->getRepository('VivaitCRMBundle:Customer')
            ->findAll();

        return $this->render('VivaitCRMBundle:Customer:list.html.twig', [
                'customers'=>$customers
            ]);
    }

    public function addAction() {
        $customer = new Customer();
        //Full way
        //$form = $this->container->get('form.factory')->createBuilder('form', $customer, []);
        $form = $this->createFormBuilder($customer)
            ->add('forename','text')
            ->add('surname','text')
            ->add('submit','submit')
            ->getForm();

        return $this->render('VivaitCRMBundle:Customer:form.html.twig', [
                'form'=>$form->createView()
            ]);



    }
}
