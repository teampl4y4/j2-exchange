<?php

/* J2ExchangeBundle:Default:index.html.twig */
class __TwigTemplate_61b5bc2ba9e13ebc1b7f4f64d0a534be extends Twig_Template
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
        echo "Variable: ";
        if (isset($context["var"])) { $_var_ = $context["var"]; } else { $_var_ = null; }
        echo twig_escape_filter($this->env, $_var_, "html", null, true);
        echo "!
";
    }

    public function getTemplateName()
    {
        return "J2ExchangeBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  17 => 1,);
    }
}
