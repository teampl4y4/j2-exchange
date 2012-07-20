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
     * @Route("/revenue/{daysBack}")
     * @Method({"GET"})
     */
    public function revenueAction($daysBack = 30) {

        $revenue = array( 'data' => array(), 'label' => 'revenue');
        $orders  = array( 'data' => array(), 'label' => 'orders');

        for($i=0; $i<=$daysBack; $i++) {
            $revenue['data'][] = array($i, cos($i+1));
            $orders['data'][]  = array($i, cos($i+5));
        }

        $gData = array(
            $revenue,
            $orders
        );

        return $this->success($gData);

    }
}