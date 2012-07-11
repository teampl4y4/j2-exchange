<?php

namespace J2\Bundle\ExchangeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $em        = $this->getDoctrine()->getEntityManager();
        $exchange  = $em->getRepository('J2ExchangeBundle:Exchange')->find(1);
        return array('exchange' => $exchange);
    }
}
