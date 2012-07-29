<?php

namespace J2\Bundle\ExchangeBundle\Util;

use Doctrine\Common\Collections\ArrayCollection;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JsonEncoder
 *
 * @author josh
 */
class JsonEncoder {

    private $maxLevels = 1;

    public function maxDepth($depth) {
        $this->levels = $depth;
    }

    public function encode($data, $level = 1) {
        $repsonse = null;
        $vars = null;
        if (is_a($data, 'ArrayCollection')) {
            if ($level <= $this->maxLevels){
                $response = $this->encode($data, ++$level);
            }
            else
                $response = array_fill(0, $data->count(), "");
        }
        elseif (is_array($data)) {
            if ($level <= $this->maxLevels) {
                foreach ($data as $key => $value) {
                    $response[$key] = $this->encode($value, ++$level);
                }
            } else {
                if (count($data))
                    $response = array_fill(0, count($data), "");
                $response = array();
            }
        }
        elseif (is_object($data)) {
            if ($level <= $this->maxLevels){
                $vars = $data->toJson(true);
                foreach ($vars as $key => $value) {
                    $response[$key] = $this->encode($value, ++$level);
                }
            }
            else $response = $data;
        }
        else{
        }
            $response = $data;
        return (isset($response) && !is_object($response)) ? $response : null;
    }

}

?>
