<?php

namespace J2\Bundle\ExchangeBundle\Twig;

use Twig_Extension;
use Twig_Filter_Method;

class Text extends Twig_Extension
{

    public function getFilters()
    {
        return array(
            'nl2br'    => new Twig_Filter_Method($this, 'twig_nl2br_filter'),
            'truncate' => new Twig_Filter_Method($this, 'twig_truncate_filter'),
            'wordwrap' => new Twig_Filter_Method($this, 'twig_wordwrap_filter')
        );
    }

    /**
     * Name of this extension
     *
     * @return string
     */
    public function getName()
    {
        return 'text_extension';
    }

    function twig_nl2br_filter($value, $sep = '<br />')
    {
        return str_replace("\n", $sep."\n", $value);
    }

    function twig_truncate_filter($value, $length = 30, $preserve = false, $separator = '...')
    {
        if (strlen($value) > $length) {
            if ($preserve) {
                if (false !== ($breakpoint = strpos($value, ' ', $length))) {
                    $length = $breakpoint;
                }
            }

            return substr($value, 0, $length) . $separator;
        }

        return $value;
    }

    function twig_wordwrap_filter($value, $length = 80, $separator = "\n", $preserve = false)
    {
        return wordwrap($value, $length, $separator, !$preserve);
    }

}
