<?php

namespace J2\Bundle\ExchangeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Products Controller
 *
 * @Route("/products")
 */
class ProductsController extends Controller
{
    /**
     * @Route("/", name="_products")
     * @Template()
     */
    public function indexAction()
    {
        $user     = $this->get('security.context')->getToken()->getUser();

        $products = $this->getDoctrine()
                         ->getEntityManager()
                         ->getRepository('J2ExchangeBundle:Product')
                         ->findByUser($user);

        return array('products' => $products, 'company' => $user->getCompany());
    }
    
    public function addAction(){
        
    }
    
    public function deleteAction(){
        
    }
    
    public function editAction(){
        
    }
    
    /**
     * @Route("/product/{id}", name="_product")
     * @Template()
     */
    public function viewAction($id){
        $user     = $this->get('security.context')->getToken()->getUser();

        $product = $this->getDoctrine()
                         ->getEntityManager()
                         ->getRepository('J2ExchangeBundle:Product')
                         ->findOneBy(array('id' => $id, 'company_id' => $user->getCompany()->getId()));

        return array('product' => $product, 'company' => $user->getCompany());
    }
    
    public function saveAction(){
        
    }
}
