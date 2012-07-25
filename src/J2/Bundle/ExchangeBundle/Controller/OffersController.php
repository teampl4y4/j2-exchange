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
        /** @var $user \J2\Bundle\ExchangeBundle\Entity\User */
        $user     = $this->get('security.context')->getToken()->getUser();

        $offers = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository('J2ExchangeBundle:Offer')
            ->findActiveOffersByExchange($user->getCurrentExchange());

        return array('offers' => $offers, 'company' => $user->getCompany());
    }

    /**
     * @Route("/offer/{id}", name="_offer")
     * @Template()
     */
    public function viewAction($id)
    {
        /** @var $user \J2\Bundle\ExchangeBundle\Entity\User */
        $user     = $this->get('security.context')->getToken()->getUser();

        $offer = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository('J2ExchangeBundle:Offer')
            ->findOneBy(array(
                'id' => $id,
                'exchange' => $user->getCurrentExchange()->getId()
        ));

        if(!$offer) {
            //the offer doesn't belong to the current exchange or the offer doesn't exists we should 404 error
            throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException('Offer not found');
        }

        return array('offer' => $offer);
    }
}
