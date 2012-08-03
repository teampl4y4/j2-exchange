<?php

namespace J2\Bundle\ExchangeBundle\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception;
use Symfony\Component\HttpFoundation\Response;

use J2\Bundle\ExchangeBundle\Entity;
use J2\Bundle\ExchangeBundle\Util\JsonEncoder;

abstract class AbstractApiController extends Controller
{
    protected function response($data, $success = true, $status_code = 200, $headers = array()) {


        $serializer = $this->container->get('serializer');

        return new Response(
            $serializer->serialize(array('success' => $success, 'response' => $data), 'json'),
            $status_code,
            array('Content-Type' => 'application/json') + $headers);
    }

    protected function success($data, $status_code=200) {
        return $this->response($data, true, $status_code, array());
    }

    protected function failure($data) {
        return $this->response($data, false, 400, array());
    }
}