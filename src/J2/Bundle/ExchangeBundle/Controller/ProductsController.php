<?php

namespace J2\Bundle\ExchangeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Products Controller
 *
 * @Route("/products")
 */
class ProductsController extends Controller
{
    /**
     * @Route("/", name="_products")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
