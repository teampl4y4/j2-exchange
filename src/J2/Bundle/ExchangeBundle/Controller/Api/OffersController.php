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
            ->findOffersByUser($user);

        return $this->success($offers);
    }

    /**
     * @Route("/setActive/{id}/{active}", name="_api_offers_setActive")
     */
    public function setActive($id, $active) {
        
        $em = $this->getDoctrine()->getEntityManager();
        
        /* @var $offer \J2\Bundle\ExchangeBundle\Entity\Offer */
        $offer = $em->getRepository('J2ExchangeBundle:Offer')
                    ->findOneBy(array('id' => $id));
        
        if($offer instanceof \J2\Bundle\ExchangeBundle\Entity\Offer) {
            $offer->setActive($active);
            $em->persist($offer);
            $em->flush();
        }
        return $this->success($offer);
    }

}
