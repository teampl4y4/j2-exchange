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
            ->findOffersByUser($user);

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

        /** @var $offerRepository \J2\Bundle\ExchangeBundle\Entity\OfferRepository */
        $offerRepository = $this->getDoctrine()
                                ->getEntityManager()
                                ->getRepository('J2ExchangeBundle:Offer');

        $offer = $offerRepository
            ->findOneBy(array(
                'id' => $id,
                'exchange' => $user->getCurrentExchange()->getId(),
                'company' => $user->getCompany()->getId()
        ));

        if(!$offer) {
            //the offer doesn't belong to the current exchange or the offer doesn't exists we should 404 error
            throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException('Offer not found');
        }

        $matches = $offerRepository->findMatchedOffersOnOffer($offer);

        return array('offer' => $offer, 'matches' => $matches);
    }
}
