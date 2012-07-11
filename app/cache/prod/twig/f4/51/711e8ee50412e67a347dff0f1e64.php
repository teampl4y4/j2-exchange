<?php

/* TwigBundle:Exception:error.json.twig */
class __TwigTemplate_f451711e8ee50412e67a347dff0f1e64 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo twig_jsonencode_filter(array("error" => array("code" => $this->getContext($context, "status_code"), "message" => $this->getContext($context, "status_text"))));
        echo "
";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.json.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 9,  23 => 5,  20 => 2,  17 => 1,  135 => 54,  129 => 50,  122 => 46,  116 => 42,  113 => 41,  108 => 40,  104 => 38,  102 => 37,  94 => 32,  89 => 29,  87 => 28,  84 => 27,  81 => 26,  73 => 21,  70 => 20,  67 => 19,  62 => 16,  59 => 15,  55 => 13,  51 => 11,  48 => 10,  41 => 9,  38 => 8,  35 => 7,  31 => 4,  28 => 3,);
    }
}
