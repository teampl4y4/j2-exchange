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

        //TODO make them pull real offers and serialize -- currently using fake stdClass stuff

        $offers = array();
        for($i=0;$i<=9;$i++) {
            $offer = new \stdClass();
            $offer->id = ($i + 1);
            $offer->name = 'Offer ' . ($i+1);
            $offer->description = 'Description for offer ' . ($i+1);
            $offer->listPrice = 100 + ($i + rand(0,99));
            $offer->whisperPrice = 50 + ($i + rand(0,45));
            $offer->available = rand(10,199);
            $offer->active = rand(0,1);
            $offer->matches = array();

            for($ii=0; $ii<=10; $ii++) {
                $r = rand(0,3);
                if($r == 1) {
                    $match = new \stdClass();
                    $match->foo = 'fighers';
                    $offer->matches[] = $match;
                }
            }

            $offers[] = $offer;
        }

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
