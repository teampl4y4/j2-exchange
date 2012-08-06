<?php

namespace J2\Bundle\ExchangeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use J2\Bundle\ExchangeBundle\Form\OffersType;
use J2\Bundle\ExchangeBundle\Entity\Offer;
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
        $form = $this->createForm(new OffersType(), new Offer());

        $matches = $offerRepository->findMatchedOffersOnOffer($offer);

        return array('form' => $form->createView(),'offer' => $offer, 'matches' => $matches);
    }
    
    /**
     * @Route("/add", name="_add_offer")
     * @Template()
     */
    public function addAction(){
        $user     = $this->get('security.context')->getToken()->getUser();
        $form = $this->createForm(new OffersType(), new Offer());
        return array('form' => $form->createView(), 'company' => $user->getCompany());
    }
    
    
    /**
     * @Method("GET")
     * @Route("/delete/{id}", name="_delete_offer")
     */
    public function deleteAction($id){
        $user     = $this->get('security.context')->getToken()->getUser();
        $deleted = $this->getDoctrine()
                         ->getEntityManager()
                         ->getRepository('J2ExchangeBundle:Offer')
                         ->delete($id,$user);
        return $this->redirect($this->generateUrl("_offers"));
    }
    
    /**
     * @Route("/edit/{id}", name="_edit_offer")
     * @Template()
     */
    public function editAction($id){
        $user     = $this->get('security.context')->getToken()->getUser();
        $offer = $this->getDoctrine()
                         ->getEntityManager()
                         ->getRepository('J2ExchangeBundle:Offer')
                         ->findOneByUser($id,$user);
        $form = $this->createForm(new OffersType(),$offer);
        return array('offer' => $offer, 'form' => $form->createView(), 'company' => $user->getCompany());
    }
}
