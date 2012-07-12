<?php

namespace J2\Bundle\ExchangeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use J2\Bundle\ExchangeBundle\Controller\AbstractController;
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
        $this->getDoctrine()->getRepository('J2ExchangeBundle:SocialProfile');
    }
}
