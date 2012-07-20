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

    /**
     * @Route("/inventory/{daysBack}")
     * @Method({"GET"})
     */
    public function inventoryAction($daysBack = 30) {

        $total = array( 'label' => 'Total', 'color' => '#ccc');
        $used  = array( 'label' => 'Used', 'color' => 'green');

        for($i=0;$i<=$daysBack;$i++) {
            $total['data'][] = array($i, $i+rand(10,20));
            $used['data'][]  = array($i, $i+rand(1,10));
        }

        return $this->success(array($total, $used));
    }

    /**
     * @Route("/offers/{daysBack}")
     * @Method({"GET"})
     */
    public function offersAction($daysBack = 30) {

        $data = array();
        for($i=0; $i <= round($daysBack/15)+1; $i++) {
            $data[] = array('label' => 'Offer #' . ($i + 1), 'data' => round(rand(1,9) + $i));
        }

        return $this->success($data);

    }

}