<?php

namespace J2\Bundle\ExchangeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
/**
 * Offers Controller
 *
 * @Route("/offers")
 */
class OffersController extends Controller
{
    /**
     * @Route("/", name="_offers")
     * @Template()
     */
    public function indexAction()
    {
        $user     = $this->get('security.context')->getToken()->getUser();

        $offers = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository('J2ExchangeBundle:Offer')
            ->getActiveOffersByCompany($user->getCompany());

        return array('offers' => $offers, 'company' => $user->getCompany());
    }
}
