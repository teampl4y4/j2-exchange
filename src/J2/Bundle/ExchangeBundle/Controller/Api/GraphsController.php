<?php

namespace J2\Bundle\ExchangeBundle\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception;
use Symfony\Component\HttpFoundation\Response;


/**
 * @Route("/api/graphs")
 */
class GraphsController extends AbstractApiController
{
    /**
     * @Route("/revenue")
     * @Method({"GET"})
     */
    public function revenueAction() {

        $gData = array(
            array( 'data' => array(0 => array(0, 1), 1 => array(1, 4), 2 => array(2, 8)), 'label' => 'revenue' ),
            array( 'data' => array(0 => array(0, 1), 1 => array(1, 2), 2 => array(2, 3)), 'label' => 'orders' )
        );

        return $this->success($gData);

    }
}