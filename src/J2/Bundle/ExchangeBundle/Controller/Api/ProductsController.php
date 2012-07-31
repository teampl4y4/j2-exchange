<?php

namespace J2\Bundle\ExchangeBundle\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/api/products")
 */
class ProductsController extends AbstractApiController {
    
    private static $create_error = "Product could not be added.";
    private static $update_error = "Product could not be updated.";

    /**
     * @Route("/", name="_api_products")
     */
    public function indexAction() {
        $user = $this->get('security.context')->getToken()->getUser();

        $products = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('J2ExchangeBundle:Product')
                ->findByUser($user);

        return $this->success($products);
    }

    /**
     * @Route("/setActive/{id}/{active}", name="_api_products_setActive")
     */
    public function setActive($id, $active) {

        $em = $this->getDoctrine()->getEntityManager();

        $product = $em->getRepository('J2ExchangeBundle:Product')
                ->findOneBy(array('id' => $id));

        if ($product instanceof \J2\Bundle\ExchangeBundle\Entity\Product) {
            $product->setActive($active);
            $em->persist($offer);
            $em->flush();
        }
        return $this->success($product);
    }

    /**
     * @Method("POST")
     * @Route("/create/", name="_create_product")
     */
    public function createAction() {
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $user = $this->get('security.context')->getToken()->getUser();
            $params = json_decode($content); // 2nd param to get as array
            $data = $this->getDoctrine()
                    ->getEntityManager()
                    ->getRepository('J2ExchangeBundle:Product')
                    ->create($params, $user);
            return $this->success($data);
        }
    }
    
    /**
     * @Method("POST")
     * @Route("/update/{id}", name="_update_product")
     */
    public function updateAction($id){
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $user = $this->get('security.context')->getToken()->getUser();
            $params = json_decode($content); // 2nd param to get as array
            $data = $this->getDoctrine()
                    ->getEntityManager()
                    ->getRepository('J2ExchangeBundle:Product')
                    ->update($id, $params, $user);
            return $this->success($data);
        }
    }

}
