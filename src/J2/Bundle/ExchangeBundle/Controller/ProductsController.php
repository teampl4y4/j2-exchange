<?php

namespace J2\Bundle\ExchangeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use J2\Bundle\ExchangeBundle\Form\ProductsType;

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
    
    /**
     * @Route("/add", name="_add_product")
     * @Template()
     */
    public function addAction(){
        $user     = $this->get('security.context')->getToken()->getUser();
        $form = $this->createForm(new ProductsType());
        return array('form' => $form->createView(), 'company' => $user->getCompany());
    }
    
    
    /**
     * @Method("DELETE")
     * @Route("/{id}", name="_delete_product")
     */
    public function deleteAction($id){
        $user     = $this->get('security.context')->getToken()->getUser();
        $deleted = $this->getDoctrine()
                         ->getEntityManager()
                         ->getRepository('J2ExchangeBundle:Product')
                         ->deleteProduct($id,$user);
        return $this->redirect($this->generateUrl("_products"));
    }
    
    /**
     * @Route("/edit/{id}", name="_edit_product")
     * @Template()
     */
    public function editAction($id){
        $user     = $this->get('security.context')->getToken()->getUser();
        $product = $this->getDoctrine()
                         ->getEntityManager()
                         ->getRepository('J2ExchangeBundle:Product')
                         ->findOneByUser($id,$user);
        $form = $this->createForm(new ProductsType(),$product);
        return array('product' => $product, 'form' => $form->createView(), 'company' => $user->getCompany());
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
                         ->findOneByUser($id,$user);

        return array('product' => $product, 'company' => $user->getCompany());
    }
    
    /**
     * @Method("PUT")
     * @Route("/{id}", name="_save_product")
     */
    public function saveAction(){
    }
}
