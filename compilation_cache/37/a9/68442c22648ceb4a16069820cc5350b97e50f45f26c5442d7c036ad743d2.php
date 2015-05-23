<?php

/* index.html */
class __TwigTemplate_37a968442c22648ceb4a16069820cc5350b97e50f45f26c5442d7c036ad743d2 extends Twig_Template
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
        echo "<!DOCTYPE>
<html>
<head>
  <meta charset=\"utf-8\"/>
  <title>Nazdárek</title>
</head>
<body>

";
        // line 9
        if ((!twig_test_empty((isset($context["product"]) ? $context["product"] : null)))) {
            // line 10
            echo "  <p>Name of product: ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : null), "name"), "html", null, true);
            echo "</p>
  <p>Product price: ";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : null), "price"), "html", null, true);
            echo "</p>
  <p>In stock: ";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : null), "inStock"), "html", null, true);
            echo "</p>
";
        } else {
            // line 14
            echo "<h2> Check product for pixmania:</h2>
  <form method=\"GET\" action=\"/pix/\">
    <input type\"text\" name=\"product\" placeholder=\"Please give url for product\">
    <input type=\"submit\" value=\"OK\">
  </form>

";
        }
        // line 21
        echo "</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 21,  45 => 14,  40 => 12,  36 => 11,  31 => 10,  29 => 9,  19 => 1,);
    }
}
