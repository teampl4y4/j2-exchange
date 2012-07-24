<?php

namespace J2\Bundle\ExchangeBundle\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception;
use Symfony\Component\HttpFoundation\Response;


/**
 * @Route("/api/match")
 */
class MatchController extends AbstractApiController
{

    /**
     * @Route("/find/{id}/{limit}", name="_find_match", requirements={"id" = "\d+"}, defaults={"limit" = 3})
     */
    public function findAction($id,$limit) {
        $user = $this->get('security.context')->getToken()->getUser();

        $offer = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository('J2ExchangeBundle:Offer')
            ->find($id);

        $matches = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('J2ExchangeBundle:Offer')
                ->findMatchesByOffer($offer,$limit);

        return $this->success($matches);
    }

}
