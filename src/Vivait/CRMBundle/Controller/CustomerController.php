<?php

namespace Vivait\CRMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Vivait\CRMBundle\Entity\Customer;

class CustomerController extends Controller
{
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $customers = $em->getRepository('VivaitCRMBundle:Customer')
            ->findAll();

        return $this->render(
            'VivaitCRMBundle:Customer:list.html.twig',
            [
                'customers' => $customers
            ]
        );
    }

    public function addAction(Request $request, $customer = null)
    {
        $em = $this->getDoctrine()->getManager();


        if (!$customer) {
            $customer = new Customer();
        } else {
            $customer = $em->getRepository('VivaitCRMBundle:Customer')
                ->find($customer);
        }


        //Full way
        //$form = $this->container->get('form.factory')->createBuilder('form', $customer, []);
        $form = $this->createFormBuilder($customer)
            ->add('forename', 'text')
            ->add('surname', 'text')
            ->add('dob', 'date',['label'=>'Date of Birth','input_wrapper_class'=>null,'separator_wrapper_class'=>null,'widget'=>'single_text'])
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em->persist($customer);
            $em->flush();

            return $this->redirect($this->generateUrl('vivait_crm_customer_list'));
        }

        return $this->render(
            '@VivaitBootstrap/Default/form.html.twig',
            [
                'form' => [
                    'form' => $form->createView(),
                    'title' => 'Add/Edit Customer'
                ]
            ]
        );


    }

    public function deleteAction(Request $request, $customer)
    {
        $em = $this->getDoctrine()->getManager();
        $customer = $em->getRepository('VivaitCRMBundle:Customer')
            ->find($customer);

        $em->remove($customer);
        $em->flush();

        return $this->redirect($this->generateUrl('vivait_crm_customer_list'));

    }
}
