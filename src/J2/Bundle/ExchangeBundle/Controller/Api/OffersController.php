<?php

namespace J2\Bundle\ExchangeBundle\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception;
use Symfony\Component\HttpFoundation\Response;


/**
 * @Route("/api/offers")
 */
class OffersController extends AbstractApiController
{

    /**
     * @Route("/", name="_api_offers")
     */
    public function indexAction() {
        $user = $this->get('security.context')->getToken()->getUser();

        $offers = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository('J2ExchangeBundle:Offer')
            ->findActiveOffersByUser($user);

        return $this->success($offers);
    }

    /**
     * @Route("/test", name="_api_test")
     */
    public function testAction() {
        $product = $this->getDoctrine()
                         ->getEntityManager()
                         ->getRepository('J2ExchangeBundle:Product')
                         ->findOneBy(array('id' => 1));

        return $this->success($product);
    }

}
