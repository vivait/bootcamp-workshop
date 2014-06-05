<?php

namespace Vivait\CRMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Vivait\CRMBundle\Entity\Customer;
use Vivait\CRMBundle\Form\Type\CustomerType;

class CustomerController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $customers = $em->getRepository('VivaitCRMBundle:Customer')
            ->listAllOrderBySurname();

        return $this->render(
            'VivaitCRMBundle:Customer:list.html.twig',
            [
                'customers' => $customers
            ]
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction() {
        $customer = new Customer();
        return $this->forward('VivaitCRMBundle:Customer:edit', [
                'customer'  => $customer
            ]);

    }


    /**
     * @param Request $request
     * @param Customer $customer
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, Customer $customer)
    {
        $form = $this->createForm(new CustomerType(),$customer);

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
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

    /**
     * @param Customer $customer
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Customer $customer)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($customer);
        $em->flush();

        return $this->redirect($this->generateUrl('vivait_crm_customer_list'));

    }
}
