<?php

/* TwigBundle:Exception:exception.json.twig */
class __TwigTemplate_751317f02d705e7e5dea165c8372f982 extends Twig_Template
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
        echo twig_jsonencode_filter($this->getAttribute($this->getContext($context, "exception"), "toarray"));
        echo "
";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception.json.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 83,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 76,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 61,  156 => 60,  153 => 59,  146 => 55,  142 => 54,  137 => 51,  131 => 48,  126 => 46,  120 => 45,  117 => 44,  103 => 36,  99 => 34,  77 => 28,  74 => 27,  57 => 22,  47 => 19,  39 => 15,  32 => 11,  24 => 6,  22 => 3,  30 => 9,  23 => 3,  20 => 2,  17 => 1,  135 => 50,  129 => 47,  122 => 46,  116 => 42,  113 => 43,  108 => 40,  104 => 38,  102 => 37,  94 => 31,  89 => 29,  87 => 28,  84 => 27,  81 => 26,  73 => 21,  70 => 26,  67 => 19,  62 => 24,  59 => 23,  55 => 13,  51 => 11,  48 => 10,  41 => 9,  38 => 8,  35 => 7,  31 => 4,  28 => 3,);
    }
}
