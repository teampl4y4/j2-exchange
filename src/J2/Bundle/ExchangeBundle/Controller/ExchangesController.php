<?php

namespace J2\Bundle\ExchangeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
/**
 * Exchanges Controller
 *
 * @Route("/exchanges")
 */
class ExchangesController extends Controller
{
    /**
     * @Route("/setActive/{id}", name="_set_active_exchange")
     */
    public function setActiveExchange($id)
    {
        /** @var $user \J2\Bundle\ExchangeBundle\Entity\User */
        $user     = $this->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getEntityManager();

        //TODO make sure user has the permission to use this exchange
        $exchange = $em->getRepository('J2ExchangeBundle:Exchange')->find($id);

        $user->setCurrentExchange($exchange);
        $em->persist($user);
        $em->flush();

        return $this->redirect( $this->getRequest()->server->get('HTTP_REFERER') );
    }
}
