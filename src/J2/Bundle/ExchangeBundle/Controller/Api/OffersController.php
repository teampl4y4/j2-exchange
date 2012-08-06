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

    /**
     * @Method("POST")
     * @Route("/create/", name="_create_offer")
     */
    public function createAction() {
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $user = $this->get('security.context')->getToken()->getUser();
            $params = json_decode($content); // 2nd param to get as array
            $product = $this->getDoctrine()
                    ->getEntityManager()
                    ->getRepository('J2ExchangeBundle:Offer')
                    ->findOneByUser($params->product,$user);
            $data = $this->getDoctrine()
                    ->getEntityManager()
                    ->getRepository('J2ExchangeBundle:Offer')
                    ->create($params, $user, $product);
            return $this->success($data);
        }
    }
    
    /**
     * @Method("POST")
     * @Route("/update/{id}", name="_update_offer")
     */
    public function updateAction($id){
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $user = $this->get('security.context')->getToken()->getUser();
            $params = json_decode($content); // 2nd param to get as array
            $product = $this->getDoctrine()
                    ->getEntityManager()
                    ->getRepository('J2ExchangeBundle:Offer')
                    ->findOneByUser($params->product,$user);
            $data = $this->getDoctrine()
                    ->getEntityManager()
                    ->getRepository('J2ExchangeBundle:Offer')
                    ->update($id, $params, $user,$product);
            return $this->success($data);
        }
    }

}
